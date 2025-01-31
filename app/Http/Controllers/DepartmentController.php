<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function index()
    {
        $department =  Department::all();


        return Inertia::render('Department', [

            'departments' => $department
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'code' => Str::lower($request->input('code')),
            'name' => Str::lower($request->input('name')),
            'head' => Str::lower($request->input('head')),
            'created_by' => Str::lower(Auth::user()->name),
        ]);
        // Validate the incoming request
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:departments,code',
            'name' => 'required|string|max:255',
            'head' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
        ]);

        try {
            // Create the department
            $department = Department::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'head' => $validated['head'],
                'created_by' => $validated['created_by'],
            ]);

            // Return a success response
            return response()->json(['success' => true, 'message' => 'Department created successfully.']);
        } catch (QueryException $e) {
            // Catch database-related errors (like foreign key violations, etc.)
            \Log::error('Database Error: ' . $e->getMessage()); // Log the database error
            return response()->json(['success' => false, 'message' => 'Database error occurred. Please try again later.'], 500);
        } catch (Throwable $e) {
            // Catch all other errors and log them
            \Log::error('Server Error: ' . $e->getMessage()); // Log the server-side error
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again later.'], 500);
        }
    }

     public function edit($id)
     {
        $department = Department::findOrFail($id);
        return response()->json($department);
        dd($department);
     }
 
     // Method to update the department
     public function update(Request $request, $id)
     { 
         $validated = $request->validate([
            'code' => 'required|string|max:20|unique:departments,code,'. $id,
            'name' => 'required|string|max:255',
            'head' => 'required|string|max:255',
         ]);
 
         try {
            // Find the department by ID
            $department = Department::findOrFail($id);
    
            // Update the department
            $department->update([
                'code' => Str::lower($validated['code']),
                'name' => Str::lower($validated['name']),
                'head' => Str::lower($validated['head']),
            ]);
    
            return response()->json(['success' => true, 'message' => 'Department updated successfully.']);
        } catch (\Exception $e) {
            \Log::error('Update Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the department. Please try again later.'], 500);
        }
     }
 
     // Method to delete a department
     public function destroy($id)
     {
         $department = Department::findOrFail($id);
         $department->delete();
 
         return response()->json(['message' => 'Department deleted successfully']);
     }
}

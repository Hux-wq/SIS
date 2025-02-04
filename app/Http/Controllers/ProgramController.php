<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgramController extends Controller
{
    public function index()
    {
        $programs =  Program::all();
        $departments = Department::select('id','code','name')->get();
       
        return Inertia::render('Program', [

            'programs' => $programs,
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'code' => Str::lower($request->input('code')),
            'name' => Str::lower($request->input('name')),
            'created_by' => Str::lower(Auth::user()->name),
            'department_id' => $request->input('department_id'),
        ]);
        // Validate the incoming request
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:programs,code',
            'name' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
            'department_id' => 'required|integer|max:255',
        ]);

        try {
            // Create the program
            $program = Program::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'created_by' => $validated['created_by'],
                'department_id' => $validated['department_id'],     
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
        $program = Program::findOrFail($id);
        return response()->json($program);
     }
 
     // Method to update the department
     public function update(Request $request, $id)
     { 
        \Log::info('Received data:', $request->all());
         $validated = $request->validate([
            'code' => 'required|string|max:20|unique:programs,code,'. $id,
            'name' => 'required|string|max:255',
            'department_id' => 'required|integer|exists:departments,id',
         ]);
 
         try {
            
            // Find the department by ID
            $program = Program::findOrFail($id);
    
            // Update the department
            $program->update([
                'code' => Str::lower($validated['code']),
                'name' => Str::lower($validated['name']),
                'department_id' => $validated['department_id'],
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
         $program = Program::findOrFail($id);
         $program->delete();
 
         return response()->json(['message' => 'Department deleted successfully']);
     }
}

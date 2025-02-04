<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
class CourseController extends Controller
{
    public function index()
    {
        $courses =  Course::all();
        $programs = Program::select('id','code','name','department_id')->get();
        $departments = Department::select('id','code')->get();

        return Inertia::render('CourseList', [
            'courses' => $courses,
            'programs'=> $programs,
            'departments'=> $departments,
        ]);
        
    }
    public function store(Request $request)
    {
        $request->merge([
            'code' => Str::lower($request->input('code')),
            'name' => Str::lower($request->input('name')),
            'created_by' => Str::lower(Auth::user()->name),
            'program_id' => $request->input('program_id'),
        ]);
        // Validate the incoming request
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:programs,code',
            'name' => 'required|string|max:255',
            'created_by' => 'required|string|max:255',
            'program_id' => 'required|integer|max:255',
        ]);

        try {
            // Create the program
            $course = Course::create([
                'code' => $validated['code'],
                'name' => $validated['name'],
                'created_by' => $validated['created_by'],
                'program_id' => $validated['program_id'],     
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
        $course = Course::findOrFail($id);
        return response()->json($course);
    }
    public function update(Request $request, $id)
    { 
        \Log::info('Received data:', $request->all());
         $validated = $request->validate([
            'code' => 'required|string|max:20|unique:programs,code,'. $id,
            'name' => 'required|string|max:255',
            'program_id' => 'required|integer|exists:programs,id',
         ]);
 
         try {
            
            // Find the department by ID
            $course = Course::findOrFail($id);
    
            // Update the department
            $course->update([
                'code' => Str::lower($validated['code']),
                'name' => Str::lower($validated['name']),
                'program_id' => $validated['program_id'],
            ]);
    
            return response()->json(['success' => true, 'message' => 'Course updated successfully.']);
        } catch (\Exception $e) {
            \Log::error('Update Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the course. Please try again later.'], 500);
        }
     }

    public function destroy($id)
     {
         $course = Course::findOrFail($id);
         $course->delete();
 
         return response()->json(['message' => 'Course deleted successfully']);
     }
}

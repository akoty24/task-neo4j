<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        $Students = Student::all();
        return view('admin.courses.index', compact('Student'));
    }


    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(StudentRequest $request)
    {

        $course = Student::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('courses.index')->with('success', 'success');
    }

    public function edit(Student $Student)
    {
        return view('admin.courses.edit', compact('Student'));

    }
    public function update(StudentRequest $request, Student $course)
    {

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'student not found');
        }

        $course->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('courses.index')->with('success', 'student updated successfully');
    }

    public function destroy(Student $student)
    {

        if (!$student) {
            return redirect()->route('courses.index')->with('error', 'student not found');
        }

        // Delete the Course
        $student->delete();

        return redirect()->route('courses.index')->with('success', 'student deleted successfully');
    }
}

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
        return view('admin.students.index', compact('Student'));
    }


    public function create()
    {
        return view('admin.students.create');
    }

    public function store(StudentRequest $request)
    {

        $course = Student::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('students.index')->with('success', 'success');
    }

    public function edit(Student $Student)
    {
        return view('admin.students.edit', compact('Student'));

    }
    public function update(StudentRequest $request, Student $course)
    {

        if (!$course) {
            return redirect()->route('students.index')->with('error', 'student not found');
        }

        $course->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('students.index')->with('success', 'student updated successfully');
    }

    public function destroy(Student $student)
    {

        if (!$student) {
            return redirect()->route('students.index')->with('error', 'student not found');
        }

        // Delete the Course
        $student->delete();

        return redirect()->route('students.index')->with('success', 'student deleted successfully');
    }
}

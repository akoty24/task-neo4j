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

        $Students = Student::orderBy('id', 'asc')->get();
        return view('admin.students.index', compact('Students'));
    }


    public function create()
    {
       
        return view('admin.students.create');
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        $Student=Student::create($data);
        return redirect()->route('students.index')->with('success', 'success');
    }

    public function edit(Student $Student)
    {
        return view('admin.students.edit', compact('Student'));

    }
    public function update(StudentRequest $request, Student $Student)
    {
        $Student->update($request->validated());

        return redirect()->route('students.index')->with('success', ' success');
    }

    public function destroy($id)
    {
        $Student=Student::findOrFail($id);
        $Student->delete();
        return redirect()->route('students.index')->with('success', 'success');
    }
}

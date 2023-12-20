<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $Courses = Course::orderBy('id', 'asc')->get();
        return view('admin.courses.index', compact('Courses'));
    }


    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {

        $Course = new Course(['name' => 961]);

        $Course->save();
        return redirect()->route('courses.index')->with('success', 'success');
    }

    public function edit(Course $Course)
    {
        return view('admin.courses.edit', compact('Course'));

    }
    public function update(CourseRequest $request, Course $Course)
    {
        $Course->update($request->validated());

        return redirect()->route('courses.index')->with('success', ' success');
    }

    public function destroy($id)
    {
        $Course=Course::findOrFail($id);
        $Course->delete();
        return redirect()->route('courses.index')->with('success', 'success');
    }
}

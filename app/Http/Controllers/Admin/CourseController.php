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

        $Courses = Course::all();
        return view('admin.courses.index', compact('Courses'));
    }


    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {

        $course = Course::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('courses.index')->with('success', 'success');
    }

    public function edit(Course $Course)
    {
        return view('admin.courses.edit', compact('Course'));

    }
    public function update(CourseRequest $request, Course $course)
    {

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        $course->update([
            'name' => $request->input('name'),

        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        // Delete the Course
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}

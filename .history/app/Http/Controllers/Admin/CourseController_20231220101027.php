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

        $course = Course::create([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('courses.index')->with('success', 'success');
    }

    public function edit(Course $Course)
    {
        return view('admin.courses.edit', compact('Course'));

    }
    public function update(CourseRequest $request, Course $Course)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        // Update the Course with data from the request
        $course->update([
            'name' => $request->input('name'),
            // Add other fields from the request as needed
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');





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

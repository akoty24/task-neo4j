<?php

namespace App\Http\Controllers\DataResources;

use App\Http\Requests\Api\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\enrollments;
use App\Models\enrollmentss;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentDataResource
{


    public function getAll(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 15); // Use get method to avoid "Undefined index" error
            $enrollments = Enrollment::filter($request->all())->paginate($perPage);

            return $enrollments;
        } catch (\Exception $ex) {
            // Log or handle the exception as needed
            return [];
        }
    }
    public function create_one(EnrollmentRequest $request)
    {
        try {
        $courseId = $request->input('course_id');
        $studentId = $request->input('student_id');

        $course = Course::find($courseId);
        $student = Student::find($studentId);

        if (!$course || !$student) {
            return response()->json(['error' => 'Course or student not found'], 404);
        }

        $enrollment= $course->students()->attach($student);
        return $enrollment;
    } catch (\Exception $ex) {
        return [];
    }
    }
}

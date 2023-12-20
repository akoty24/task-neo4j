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
                $courseName = $request->input('course_name');
                $studentName = $request->input('student_name');

                $query = Course::with('students');

                if ($courseName) {
                    $query->where('name', 'like', "%$courseName%");
                }

                if ($studentName) {
                    $query->whereHas('students', function ($q) use ($studentName) {
                        $q->where('name', 'like', "%$studentName%");
                    });
                }

                // Move the get() method here to apply the filters
                $enrollments = $query->get();

                // For debugging purposes, log the generated SQL query
                \Log::info($query->toSql());

                return $enrollments;
            } catch (\Exception $ex) {
                \Log::error($ex->getMessage());
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

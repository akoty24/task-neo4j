<?php
namespace App\Repository;

use App\Models\Course;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Support\Facades\Request;

class EloquentEnrollmentRepository implements EnrollmentRepositoryInterface{
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

                $enrollments = $query->get();

                return $enrollments;
            } catch (\Exception $ex) {
                return [];
            }}

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
            }}
    public function show(){
        return true;
    }
    public function update(){
        return true;
    }
    public function destroy(){
        return true;
    }

}

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


}

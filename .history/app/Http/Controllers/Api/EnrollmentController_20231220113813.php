<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\EnrollmentDataResource;
use App\Http\Requests\Api\EnrollmentRequest;
use App\Http\Resources\Collections\EnrollmentCollection;
use App\Http\Resources\EnrollmentResource;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use GeneralTrait;
protected $EnrollmentDataResource;

public function __construct(EnrollmentDataResource $EnrollmentDataResource)
{
    $this->EnrollmentDataResource = $EnrollmentDataResource;
}
public function get_all_enrollments(Request $request)
{
    try {
        $enrollments = $this->EnrollmentDataResource->getAll($request);

        if (empty($enrollments)) {
            return $this->returnError(__('site.data_not_found'));
        }

        return $this->returnData($enrollments, __('site.data_retrieved_successfully'));
    } catch (\Exception $ex) {
        return $this->returnError($ex->getMessage());
    }
}
public function createOne(EnrollmentRequest $request)
{

    try {
        $course = $request->input('course_id');
        $student =$request->input('student_id');
 // Find the course and student by their IDs
         $course = Course::find($course);
           $student = Student::find($student);
          // Check if both the course and student exist
          if (!$course || !$student) {
            return response()->json(['error' => 'Course or student not found'], 404);
        }
        // Attach the student to the course
        $course->students()->attach($student);

        return response()->json(['message' => 'Enrollment created successfully'], 201);

    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }
}

}

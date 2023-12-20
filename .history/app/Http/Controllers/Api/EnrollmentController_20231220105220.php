<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\EnrollmentDataResource;
use App\Http\Requests\Api\EnrollmentRequest;
use App\Http\Resources\Collections\EnrollmentCollection;
use App\Http\Resources\EnrollmentResource;
use App\Models\Enrollment;
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
        // Create a new instance of the Enrollment model
        $enrollment = new Enrollment([
            'student_id' => $request->input('student_id'),
            'course_id' => $request->input('course_id'),
        ]);

        // Save the enrollment
        $enrollment->save();

        return response()->json($enrollment, 201);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }
}

}

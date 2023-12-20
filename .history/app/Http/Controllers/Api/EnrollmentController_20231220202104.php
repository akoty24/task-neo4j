<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EnrollmentRequest;
use App\Http\Resources\EnrollmentResource;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use GeneralTrait;
private $EnrollmentRepository;

public function __construct(EnrollmentRepository $EnrollmentRepository)
{
    $this->EnrollmentRepository = $EnrollmentRepository;
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
    return EnrollmentResource::collection($enrollments);
}
public function createOne(EnrollmentRequest $request)
{
    try {
        $enrollments = $this->EnrollmentDataResource->create_one($request);

        return response()->json(['message' => 'Enrollment created successfully', 'status' => 201]);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }

}

}

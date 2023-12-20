<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EnrollmentRequest;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request; // Change this line

class EnrollmentController extends Controller
{
    use GeneralTrait;
protected $EnrollmentRepository;

public function __construct(EnrollmentRepositoryInterface $EnrollmentRepository)
{
    $this->EnrollmentRepository = $EnrollmentRepository;
}
public function get_all(Request $request)
{
    try {
        $enrollments = $this->EnrollmentRepository->getAll($request)->get;
        if (empty($enrollments)) {
            return $this->returnError(__('site.data_not_found'));
        }
        return $this->returnData($enrollments, __('site.data_retrieved_successfully'));
    } catch (\Exception $ex) {
        return $this->returnError($ex->getMessage());
    }

}
public function store(EnrollmentRequest $request)
{
    try {
        $enrollments = $this->EnrollmentRepository->create_one($request);

        return response()->json(['message' => 'Enrollment created successfully', 'status' => 201]);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }

}

}

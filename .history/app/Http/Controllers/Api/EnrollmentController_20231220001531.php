<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\EnrollmentDataResource;
use App\Http\Requests\Api\EnrollmentRequest;
use App\Http\Resources\Collections\EnrollmentCollection;
use App\Http\Resources\EnrollmentResource;
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
    public function get_all_enrollments(Request $request){
        try {
            $enrollments = $this->EnrollmentDataResource->getAll($request);
            if ($enrollments->isEmpty()) {
                return $this->returnError(__('site.data_not_found'));
            }
            $data =  new EnrollmentCollection($enrollments);

            return $this->returnData($data, __('site.data_retrieved_successfully'));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
        return EnrollmentResource::collection($enrollments);
    }
    public function createOne(EnrollmentRequest $request)

    {dd('dd');
        $enrollment = $this->EnrollmentDataResource->createOne($request->validated());

        return response()->json($enrollment, 201);
    }

}

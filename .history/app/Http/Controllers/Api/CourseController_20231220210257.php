<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\CourseDataResource;
use App\Http\Requests\Admin\CourseRequest;
use App\Http\Resources\Collections\CourseCollection;
use App\Http\Resources\CourseResource;
use App\RepositoryInterface\CourseRepositoryInterface;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use GeneralTrait;
    private $CourseRepository;

    public function __construct(CourseRepositoryInterface $CourseRepository)
    {
        $this->CourseRepository = $CourseRepository;
    }
    public function get_all( $request)
    {
        try {
            $Courses = $this->CourseRepository->getAll($request);
            if (empty($Courses)) {
                return $this->returnError(__('site.data_not_found'));
            }
            return $this->returnData($Courses, __('site.data_retrieved_successfully'));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
        return CourseResource::collection($Courses);
    }
    public function store(CourseRequest $request)
    {
        try {
            $Courses = $this->CourseRepository->create($request);
            return response()->json(['message' => 'Course created successfully', 'status' => 201]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }

}
public function update(CourseRequest $request)
    {
        try {
            $Courses = $this->CourseRepository->create($request);
            return response()->json(['message' => 'Course created successfully', 'status' => 201]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }

}

public function destroy(CourseRequest $request)
{
    try {
        $Courses = $this->CourseRepository->create($request);
        return response()->json(['message' => 'Course created successfully', 'status' => 201]);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }

}}

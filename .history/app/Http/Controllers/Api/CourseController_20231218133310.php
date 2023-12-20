<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\CourseDataResource;
use App\Http\Resources\Collections\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use GeneralTrait;
protected $CourseDataResource;

public function __construct(CourseDataResource $CourseDataResource)
{
    $this->CourseDataResource = $CourseDataResource;
}
       public function get_all_courses(Request $request){
        try {
            $courses = $this->CourseDataResource->getAll($request);
            if ($courses->isEmpty()) {
                return $this->returnError(__('site.data_not_found'));
            }
            $data =  new CourseCollection($courses);

            return $this->returnData($data, __('site.data_retrieved_successfully'));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
        return CourseResource::collection($courses);


}
}

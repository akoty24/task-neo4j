<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\StudentDataResource;
use App\Http\Resources\Collections\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use GeneralTrait;
    protected $StudentDataResource;

    public function __construct(StudentDataResource $StudentDataResource)
    {
        $this->StudentDataResource = $StudentDataResource;
    }
   public function get_all_students(Request $request){
    try {
        $students = $this->StudentDataResource->getAll($request);
        if ($students->isEmpty()) {
            return $this->returnError(__('site.data_not_found'));
        }
        $data =  new StudentCollection($students);

        return $this->returnData($data, __('site.data_retrieved_successfully'));
    } catch (\Exception $ex) {
        return $this->returnError($ex->getMessage());
    }
    return StudentResource::collection($students);

   }
}

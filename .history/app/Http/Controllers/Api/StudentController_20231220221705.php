<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataResources\StudentDataResource;
use App\Http\Requests\Admin\StudentRequest;
use App\Http\Resources\Collections\StudentCollection;
use App\Http\Resources\StudentResource;
use App\RepositoryInterface\StudentRepositoryInterface;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use GeneralTrait;
    private $StudentRepository;

    public function __construct(StudentRepositoryInterface $StudentRepository)
    {
        $this->StudentRepository = $StudentRepository;
    }
    public function get_all( Request $request)
    {
        try {
            $Students = $this->StudentRepository->getAll($request);
            if (empty($Students)) {
                return $this->returnError(__('site.data_not_found'));
            }
            return $this->returnData($Students, __('site.data_retrieved_successfully'));
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
        return StudentResource::collection($Students);
    }
    public function store(StudentRequest $request)
    {
        try {
            $Students = $this->StudentRepository->create($request);
            return response()->json(['message' => 'Student created successfully', 'status' => 201]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }


}
public function update(Request $request, $id)
    {  dd($id);
        try {
            $Students = $this->StudentRepository->update($request, $id);
            return response()->json(['message' => 'Student updated successfully', 'status' => 201]);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }

}

public function destroy(StudentRequest $request)
{
    try {
        $Students = $this->StudentRepository->create($request);
        return response()->json(['message' => 'Student created successfully', 'status' => 201]);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }

}}

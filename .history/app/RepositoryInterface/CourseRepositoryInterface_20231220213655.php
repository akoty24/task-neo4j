<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Admin\CourseRequest;
use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Support\Facades\Request;

interface CourseRepositoryInterface{

    public function getAll();
    public function create(CourseRequest $request);
    public function update(CourseRequest $request);
    public function delete(CourseRequest $request);

}

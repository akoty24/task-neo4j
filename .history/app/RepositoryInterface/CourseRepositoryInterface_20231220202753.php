<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Support\Facades\Request;

interface CourseRepositoryInterface{

    public function getAll(Request $request);
    public function create(EnrollmentRequest $request);
    public function update(EnrollmentRequest $request);
    public function delete(EnrollmentRequest $request);

}

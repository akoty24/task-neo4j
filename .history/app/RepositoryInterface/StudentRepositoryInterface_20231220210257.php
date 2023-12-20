<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Admin\StudentRequest;
use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Support\Facades\Request;

interface StudentRepositoryInterface{

    public function getAll(Request $request);
    public function create(StudentRequest $request);
    public function update(StudentRequest $request);
    public function delete(StudentRequest $request);

}

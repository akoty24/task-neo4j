<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Admin\StudentRequest;
use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Support\Facades\Request;

interface StudentRepositoryInterface{

    public function getAll();
    public function create(StudentRequest $request);
    public function update(StudentRequest $request, $id);
    public function delete($id);

}

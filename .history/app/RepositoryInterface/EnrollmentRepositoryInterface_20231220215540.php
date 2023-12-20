<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Support\Facades\Request;

interface EnrollmentRepositoryInterface{

    public function getAll(Request $request);
    public function create_one(EnrollmentRequest $request);

}

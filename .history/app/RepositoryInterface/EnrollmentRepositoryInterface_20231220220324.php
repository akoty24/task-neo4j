<?php
namespace App\RepositoryInterface;

use App\Http\Requests\Api\EnrollmentRequest;
use Illuminate\Http\Request; // Change this line

interface EnrollmentRepositoryInterface{

    public function getAll(Request $request);
    public function create_one(EnrollmentRequest $request);

}

<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use App\Models\Course;
use App\Models\Student;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request;

class CipherEnrollmentRepository implements EnrollmentRepositoryInterface{

    public function getAll(Request $request)

    {
       }

        public function create_one(EnrollmentRequest $request){
      }

}
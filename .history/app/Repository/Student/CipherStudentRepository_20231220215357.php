<?php
namespace App\Repository\Student;

use App\Http\Requests\Admin\StudentRequest;
use App\RepositoryInterface\StudentRepositoryInterface;
use Illuminate\Support\Facades\Request;

class CipherStudentRepository implements StudentRepositoryInterface {
    public function getAll()

 {}
        public function create(StudentRequest $request)
  {
         }
        public function update (StudentRequest $request, $id){


        }
        public function delete ($id){


        }
}
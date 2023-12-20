<?php
namespace App\Repository\Student;

use App\Http\Requests\Admin\StudentRequest;
use Illuminate\Http\Request;

use App\RepositoryInterface\StudentRepositoryInterface;
class CipherStudentRepository implements StudentRepositoryInterface {
    public function getAll(Request $request)

 {}
        public function create(StudentRequest $request)
  {
         }
        public function update (StudentRequest $request, $id){


        }
        public function delete ($id){


        }
}

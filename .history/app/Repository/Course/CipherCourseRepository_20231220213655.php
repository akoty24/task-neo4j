<?php
namespace App\Repository\Course;

use App\Http\Requests\Admin\CourseRequest;
use App\RepositoryInterface\CourseRepositoryInterface;
use Illuminate\Support\Facades\Request;

class CipherCourseRepository implements CourseRepositoryInterface {
    public function getAll()

    {
    }
        public function create(CourseRequest $request)
        {

         }
        public function update (CourseRequest $request){


        }
        public function delete (CourseRequest $request){


        }
}

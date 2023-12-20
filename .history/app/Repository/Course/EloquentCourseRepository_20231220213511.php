<?php
namespace App\Repository\Course;

use App\Http\Requests\Admin\CourseRequest;
use App\RepositoryInterface\CourseRepositoryInterface;
use Illuminate\Support\Facades\Request;

class EloquentCourseRepository implements CourseRepositoryInterface {
    public function getAll(Request $request)

    {
        try {


        } catch (\Exception $ex) {
            return [];
        }
    }
        public function create(CourseRequest $request)
        {
            try {
            $courseId = $request->input('course_id');
            $CourseId = $request->input('Course_id');

        } catch (\Exception $ex) {
            return [];
        }
         }
        public function update (CourseRequest $request){


        }
        public function delete (CourseRequest $request){


        }
}

<?php
namespace App\Repository\Course;

use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use App\RepositoryInterface\CourseRepositoryInterface;
use Illuminate\Support\Facades\Request;

class EloquentCourseRepository implements CourseRepositoryInterface {
    public function getAll()

    {  try {
        $courses = Course::all();
        return $courses ;
    } catch (\Exception $ex) {
        return [];
    }
    }
        public function create(CourseRequest $request)
        {
            try {
                $course = Course::create([
                    'name' => $request->input('name'),
                ]);

                return response()->json(['course' => $course], 201);
            } catch (\Exception $ex) {
                return [];
            }
         }
        public function update (CourseRequest $request){


        }
        public function delete (CourseRequest $request){


        }
}

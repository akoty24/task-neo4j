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

                return $course ;
            } catch (\Exception $ex) {
                return [];
            }
         }
        public function update (CourseRequest $request,$id){
            try {
                $course = Course::findOrFail($id);
                $course->update([
                    'name' => $request->input('name'),
                ]);
                return $course ;
            } catch (\Exception $ex) {
                return [];
            }

        }
        public function delete ($id) {
            try {
                $course = Course::findOrFail($id);
                $course->delete();
                return response()->json(['message' => 'Course deleted successfully'], 200);
            } catch (\Exception $ex) {
                return [];
            }
        }
}

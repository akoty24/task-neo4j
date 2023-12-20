<?php
namespace App\Repository\Student;

use App\Http\Requests\Admin\StudentRequest;
use App\RepositoryInterface\StudentRepositoryInterface;
use Illuminate\Support\Facades\Request;

class EloquentStudentRepository implements StudentRepositoryInterface {
    public function getAll(Request $request)

    {
        try {
            $courseName = $request->input('course_name');
            $studentName = $request->input('student_name');


        } catch (\Exception $ex) {
            return [];
        }
    }
        public function create(StudentRequest $request)
        {
            try {
            $courseId = $request->input('course_id');
            $studentId = $request->input('student_id');

        } catch (\Exception $ex) {
            return [];
        }
         }
        public function update (StudentRequest $request){



}


        public function delete (StudentRequest $request){


}


}

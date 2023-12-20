<?php
namespace App\Repository\Student;

use App\Http\Requests\Admin\StudentRequest;
use App\Models\Student;
use App\RepositoryInterface\StudentRepositoryInterface;
use Illuminate\Http\Request;

class EloquentStudentRepository implements StudentRepositoryInterface {
    public function getAll(Request $request)

    {     try {
        $query = Student::query();

        // Check if a specific parameter is provided in the request
        if ($request->has('filter_param')) {
            // Adjust the following line based on your actual filtering requirements
            $query->where('column_name', $request->input('filter_param'));
        }

        $students = $query->get();

        return $students;
    } catch (\Exception $ex) {
        return [];
    }
    }
        public function create(StudentRequest $request)
        {
            try {
                $student = Student::create([
                    'name' => $request->input('name'),
                ]);

                return $student ;
            } catch (\Exception $ex) {
                return [];
            }
         }
        public function update (StudentRequest $request,$id){
            try {
                $student = Student::findOrFail($id);

                $student->update([
                    'name' => $request->input('name'),
                ]);
                return $student ;
            } catch (\Exception $ex) {
                return [];
            }

        }
        public function delete ($id) {
            try {
                $student = Student::findOrFail($id);
                $student->delete();

            } catch (\Exception $ex) {
                return [];
            }
        }

}

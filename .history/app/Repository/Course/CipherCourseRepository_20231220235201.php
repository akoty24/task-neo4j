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
        public function delete($id)
        {
            try {
                // Implement your Cypher query for deleting a course in Neo4j
                $cypherQuery = 'MATCH (course:Course) WHERE id(course) = $id DELETE course';

                $this->neo4jClient->run($cypherQuery, ['id' => $id]);

                // If needed, you can return some response after a successful delete
                return ['success' => true];
            } catch (\Exception $ex) {
                return ['success' => false, 'error' => $ex->getMessage()];
            }
        }
}

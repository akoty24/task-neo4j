<?php
namespace App\Repository\Course;

use App\Http\Requests\Admin\CourseRequest;
use App\RepositoryInterface\CourseRepositoryInterface;
use Illuminate\Support\Facades\Request;

class CipherCourseRepository implements CourseRepositoryInterface {
    private Client $neo4jClient;

    public function __construct(Client $neo4jClient)
    {
        $this->neo4jClient = $neo4jClient;
    }

    public function getAll()
    {
        try {
            // Implement your Cypher query for fetching courses from Neo4j
            $cypherQuery = 'MATCH (course:Course) RETURN course';

            $result = $this->neo4jClient->run($cypherQuery);

            // Process $result and convert it to a suitable response

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }
    public function create(CourseRequest $request)
    {
        try {
            // Implement your Cypher query for creating a course in Neo4j
            $cypherQuery = 'CREATE (course:Course {name: $name}) RETURN course';

            $result = $this->neo4jClient->run($cypherQuery, ['name' => $request->input('name')]);

            // Process $result and convert it to a suitable response

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function update(CourseRequest $request, $id)
    {
        try {
            // Implement your Cypher query for updating a course in Neo4j
            $cypherQuery = 'MATCH (course:Course) WHERE id(course) = $id SET course.name = $name RETURN course';

            $result = $this->neo4jClient->run($cypherQuery, ['id' => $id, 'name' => $request->input('name')]);

            // Process $result and convert it to a suitable response

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
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

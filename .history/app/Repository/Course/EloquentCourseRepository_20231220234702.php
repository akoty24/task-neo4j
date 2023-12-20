<?php
namespace App\Repository\Course;

use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use App\RepositoryInterface\CourseRepositoryInterface;
use Illuminate\Support\Facades\Request;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\Types\CypherString;
class EloquentCourseRepository implements CourseRepositoryInterface {
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
            $cypherQuery = new CypherString(
                'MATCH (course:Course) WHERE id(course) = $id DELETE course',
                ['id' => $id]
            );

            $this->neo4jClient->run($cypherQuery);

        } catch (\Exception $ex) {
            return [];
        }
    }
}

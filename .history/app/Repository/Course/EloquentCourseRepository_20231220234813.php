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
            $cypherQuery = 'MATCH (course:Course) RETURN course';

            $result = $this->neo4jClient->run($cypherQuery);


            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function create(CourseRequest $request)
    {
        try {
            $cypherQuery = 'CREATE (course:Course {name: $name}) RETURN course';

            $result = $this->neo4jClient->run($cypherQuery, ['name' => $request->input('name')]);


            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function update(CourseRequest $request, $id)
    {
        try {
            $cypherQuery = 'MATCH (course:Course) WHERE id(course) = $id SET course.name = $name RETURN course';

            $result = $this->neo4jClient->run($cypherQuery, ['id' => $id, 'name' => $request->input('name')]);

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }
    public function delete($id)
{
    try {
        $cypherQuery = 'MATCH (course:Course) WHERE id(course) = $id DELETE course';

        $this->neo4jClient->run($cypherQuery, ['id' => $id]);

        return ['success' => true];
    } catch (\Exception $ex) {
        return ['success' => false, 'error' => $ex->getMessage()];
    }
}
}

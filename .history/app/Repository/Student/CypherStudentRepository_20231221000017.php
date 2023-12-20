<?php
namespace App\Repository\Student;

use App\Http\Requests\Admin\StudentRequest;
use Illuminate\Http\Request;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\Types\CypherString;
use App\RepositoryInterface\StudentRepositoryInterface;
class CypherStudentRepository implements StudentRepositoryInterface {
    private Client $neo4jClient;

    public function __construct(Client $neo4jClient)
    {
        $this->neo4jClient = $neo4jClient;
    }

    public function getAll(Request $request)
    {
        try {
            $query = 'MATCH (student:Student)';

            if ($request->has('name')) {
                $query .= ' WHERE student.name = $name';
            }

            $query .= ' RETURN student';

            $result = $this->neo4jClient->run($query, ['name' => $request->input('name')]);


            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function create(StudentRequest $request)
    {
        try {
            $cypherQuery = 'CREATE (student:Student {name: $name}) RETURN student';

            $result = $this->neo4jClient->run($cypherQuery, ['name' => $request->input('name')]);

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function update(StudentRequest $request, $id)
    {
        try {
            $cypherQuery = 'MATCH (student:Student) WHERE id(student) = $id SET student.name = $name RETURN student';

            $result = $this->neo4jClient->run($cypherQuery, ['id' => $id, 'name' => $request->input('name')]);


            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function delete($id)
    {
        try {
            $cypherQuery = 'MATCH (student:Student) WHERE id(student) = $id DELETE student';

            $this->neo4jClient->run($cypherQuery, ['id' => $id]);

            return ['success' => true];
        } catch (\Exception $ex) {
            return ['success' => false, 'error' => $ex->getMessage()];
        }
    }
}

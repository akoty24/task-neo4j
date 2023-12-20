<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\Contracts\TransactionInterface;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\Types\CypherString;
use Laudis\Neo4j\Databags\Statement;
use Laudis\Neo4j\ClientBuilder;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
class CypherEnrollmentRepository implements EnrollmentRepositoryInterface{
    private Client $neo4jClient;

    public function __construct()
    {
        $client = ClientBuilder::create()
        ->withDriver('bolt', 'bolt+s://user:password@localhost')
        ->withDriver('https', 'https://test.com', Authenticate::basic('user', 'password')) // creates an http driver
        ->withDriver('neo4j', 'neo4j://neo4j.test.com?database=my-database', Authenticate::oidc('token')) // creates an auto routed driver with an OpenID Connect token
        ->withDefaultDriver('bolt')
        ->build();

        $result = $client->writeTransaction(static function (TransactionInterface $tsx) {
             $result = $tsx->run('MERGE (x {y: "z"}:X) return x');
            return $result->first()->get('x')['y'];
});

echo $result;

    }

    public function getAll(Request $request)
    {
        try {
            $cypherQuery = 'MATCH (course:Course)-[:ENROLLED_IN]->(student:Student) RETURN course, student';

            $result = $this->neo4jClient->run($cypherQuery);

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function create_one(EnrollmentRequest $request)
    {
        try {
            $courseId = $request->input('course_id');
            $studentId = $request->input('student_id');

            $cypherQuery = "MATCH (course:Course {id: \$courseId}), (student:Student {id: \$studentId})
                 MERGE (course)-[:ENROLLED_IN]->(student)
                 RETURN course, student";

            $result = $this->neo4jClient->run($cypherQuery, ['courseId' => $courseId, 'studentId' => $studentId]);


            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }
}
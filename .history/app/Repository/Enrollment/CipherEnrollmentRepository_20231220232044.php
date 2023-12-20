<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\Contracts\TransactionInterface;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\ClientBuilder;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request; // Change this line
use App\Models\Course;
use App\Models\Student;
class CipherEnrollmentRepository implements EnrollmentRepositoryInterface{
    private Client $neo4jClient;

    public function __construct()
    {
        $this->neo4jClient = ClientBuilder::create()
            ->addHttpConnection('default', 'http://localhost:7474')
            ->setDefaultConnection('default')
            ->build();
    }

    public function getAll(Request $request)
    {
        try {
            // Implement your Cypher query for fetching enrollments from Neo4j
            $cypherQuery = 'MATCH (course:Course)-[:ENROLLED_IN]->(student:Student) RETURN course, student';

            $result = $this->neo4jClient->run($cypherQuery);

            // Process $result and convert it to a suitable response

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

            // Implement your Cypher query for creating an enrollment in Neo4j
            $cypherQuery = "MATCH (course:Course {id: \$courseId}), (student:Student {id: \$studentId})
                 MERGE (course)-[:ENROLLED_IN]->(student)
                 RETURN course, student";

            $result = $this->neo4jClient->run($cypherQuery, ['courseId' => $courseId, 'studentId' => $studentId]);

            // Process $result and convert it to a suitable response

            return $result->records();
        } catch (\Exception $ex) {
            return [];
        }
    }
}

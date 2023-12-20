<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request; // Change this line
use App\Models\Course;
use App\Models\Student;
class CipherEnrollmentRepository implements EnrollmentRepositoryInterface{
    $client = ClientBuilder::create()
    ->withDriver('bolt', 'bolt+s://user:password@localhost') // creates a bolt driver
    ->withDriver('https', 'https://test.com', Authenticate::basic('user', 'password')) // creates an http driver
    ->withDriver('neo4j', 'neo4j://neo4j.test.com?database=my-database', Authenticate::oidc('token')) // creates an auto routed driver with an OpenID Connect token
    ->withDefaultDriver('bolt')
    ->build();
    public function getAll(Request $request)
    {
        try {
            // Implement your Cypher query for fetching enrollments from Neo4j
            $cypherQuery = new CypherString(
                'MATCH (course:Course)-[:ENROLLED_IN]->(student:Student) RETURN course, student'
            );

            $result = $this->neo4jClient->run($cypherQuery);

            // Process $result and convert it to a suitable response

            return $result;
        } catch (\Exception $ex) {
            return [];
        }
       }

        public function create_one(EnrollmentRequest $request){
      }

}

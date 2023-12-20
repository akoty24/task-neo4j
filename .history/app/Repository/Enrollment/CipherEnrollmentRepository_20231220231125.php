<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\Types\CypherList;
use Laudis\Neo4j\Types\CypherString;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request; // Change this line

class CipherEnrollmentRepository implements EnrollmentRepositoryInterface{
    private Client $neo4jClient;

    public function __construct(Client $neo4jClient)
    {
        $this->neo4jClient = $neo4jClient;
    }

    public function getAll(Request $request)

    {
       }

        public function create_one(EnrollmentRequest $request){
      }

}

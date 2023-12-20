<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use Laudis\Neo4j\Client;
use Laudis\Neo4j\Types\CypherList;
use Laudis\Neo4j\Types\CypherString;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request; // Change this line

class CipherEnrollmentRepository implements EnrollmentRepositoryInterface{

    public function getAll(Request $request)

    {
       }

        public function create_one(EnrollmentRequest $request){
      }

}

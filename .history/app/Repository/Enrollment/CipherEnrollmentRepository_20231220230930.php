<?php
namespace App\Repository\Enrollment;

use App\Http\Requests\Api\EnrollmentRequest;
use App\Models\Course;
use App\Models\Student;
use App\RepositoryInterface\EnrollmentRepositoryInterface;
use Illuminate\Http\Request; // Change this line

class CipherEnrollmentRepository{
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

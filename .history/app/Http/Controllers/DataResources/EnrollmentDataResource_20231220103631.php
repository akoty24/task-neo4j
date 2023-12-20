<?php

namespace App\Http\Controllers\DataResources;

use App\Http\Requests\Api\EnrollmentRequest;
use App\Models\Enrollment;
use App\Models\enrollments;
use App\Models\enrollmentss;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentDataResource
{
    public function getAll(Request $request)
    {

        $perPage = $request->per_page ? $request->per_page : 15;
        $enrollments = Enrollment::filter($request->all())->paginate($perPage);
        dd ($enrollments);
        return $enrollments;
    }

    public function createOne(EnrollmentRequest $request)
    {
        $enrollment = Enrollment::create($request->validated());

        return response()->json($enrollment, 201);
    }
}

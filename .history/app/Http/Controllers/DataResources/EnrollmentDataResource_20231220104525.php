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
        try {
            $perPage = $request->get('per_page', 15); // Use get method to avoid "Undefined index" error
            $enrollments = Enrollment::filter($request->all())->paginate($perPage);

            return $enrollments;
        } catch (\Exception $ex) {
            // Log or handle the exception as needed
            return [];
        }
    }
    public function createOne(EnrollmentRequest $request)
    {
        $enrollment = Enrollment::create([
            'student_id' => $request->input('student_id'),
            'course_id' => $request->input('course_id'),
        ]);
        return response()->json($enrollment, 201);
    }
}

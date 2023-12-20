<?php

use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'get_all']);
    Route::post('/', [StudentController::class, 'store']);
    Route::post('/{id}', [StudentController::class, 'update']);
    Route::delete('/{id}', [StudentController::class, 'destroy']);
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'get_all']);
    Route::post('/', [CourseController::class, 'store']);
    Route::put('/{id}', [CourseController::class, 'update']);
    Route::delete('/', [CourseController::class, 'destroy']);

});

Route::prefix('enrollments')->group(function () {
    Route::get('/', [EnrollmentController::class, 'get_all']);
    Route::post('/', [EnrollmentController::class, 'store']);
});

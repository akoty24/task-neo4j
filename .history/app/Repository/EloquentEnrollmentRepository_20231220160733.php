<?php
namespace App\Repository;
class EloquentEnrollmentRepository implements EnrollmentRepositoryInterface{

    public function index($request);
    public function store($request);
    public function show($request);
    public function update($request);
    public function destroy($request);

}

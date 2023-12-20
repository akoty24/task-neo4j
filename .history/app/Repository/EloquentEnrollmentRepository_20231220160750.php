<?php
namespace App\Repository;
class EloquentEnrollmentRepository implements EnrollmentRepositoryInterface{
    public function index($request){
        return true;
    }
    public function store($request){
        return true;
    }
    public function show($request){
        return true;
    }
    public function update($request){
        return true;
    }
    public function destroy($request){
        return true;
    }

}

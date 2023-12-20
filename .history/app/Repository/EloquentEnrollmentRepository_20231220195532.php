<?php
namespace App\Repository;

use App\RepositoryInterface\EnrollmentRepositoryInterface;

class EloquentEnrollmentRepository implements EnrollmentRepositoryInterface{
    public function index(){
        return true;
    }
    public function store(){
        return true;
    }
    public function show(){
        return true;
    }
    public function update(){
        return true;
    }
    public function destroy(){
        return true;
    }

}

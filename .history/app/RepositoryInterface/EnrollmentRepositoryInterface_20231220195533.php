<?php
namespace App\RepositoryInterface;
interface EnrollmentRepositoryInterface{

    public function index();
    public function store();
    public function show();
    public function update();
    public function destroy();
}

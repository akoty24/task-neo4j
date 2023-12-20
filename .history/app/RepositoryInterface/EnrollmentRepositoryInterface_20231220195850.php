<?php
namespace App\RepositoryInterface;
interface EnrollmentRepositoryInterface{

    public function getAll(Request $request);
    public function store();
    public function show();
    public function update();
    public function destroy();
}

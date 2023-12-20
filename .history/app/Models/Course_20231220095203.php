<?php

namespace App\Models;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Course extends NeoEloquent
{
    use Filterable, HasFactory;
    protected $label = 'Course';
    protected $guarded=[];

    $user = User::create(['name' => 'Some Name', 'email' => 'some@email.com']);
    public function students()
    {
        return $this->belongsToMany(Student::class, 'ENROLLED_IN');
    }
}

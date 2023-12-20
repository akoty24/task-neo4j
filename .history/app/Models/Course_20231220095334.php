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
    protected $fillable = ['name'];


    public function students()
    {
        return $this->belongsToMany(Student::class, 'ENROLLED_IN');
    }
}

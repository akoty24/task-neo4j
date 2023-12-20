<?php

namespace App\Models;
use NeoEloquent;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NeoEloquent;
class Course extends NeoEloquent
{
    use Filterable, HasFactory;
    protected $label = 'Course';
    protected $guarded=[];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'ENROLLED_IN');
    }
}

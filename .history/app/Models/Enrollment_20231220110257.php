<?php

namespace App\Models;
use \EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Enrollment extends NeoEloquent
{

    use Filterable, HasFactory;
    protected $fillable = ['student_id', 'course_id'];
    protected $relation = 'ENROLLED_IN';

    public function student()
    {
        return $this->belongsTo(Student::class, 'ENROLLED_IN');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'ENROLLED_IN');
    }
}

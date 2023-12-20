<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
class Student extends NeoEloquent
{
    use Filterable, HasFactory;
    protected $guarded=[];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'ENROLLED_IN');
    }
    
}

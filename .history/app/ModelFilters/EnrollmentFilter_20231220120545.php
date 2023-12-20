<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class EnrollmentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function studentName($name)
    {
        return $this->related('student', 'name', 'like', "%$name%");
    }

    // public function courseName($name)
    // {
    //     return $this->related('course', 'name', 'like', "%$name%");
    // }

    public function fromDate($date)
    {
        return $this->where('created_at', '>=', $date);
    }

    public function toDate($date)
    {
        return $this->where('created_at', '<=', $date);
    }
}

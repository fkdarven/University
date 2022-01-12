<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'total_time',
    ];

    public function students()
    {
        return $this->belongsToMany('App\User','enrollments','course_id','student_id');
    }
}

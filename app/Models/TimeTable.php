<?php

namespace App\Models;

use App\Models\masters\Employee;
use App\Models\masters\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'timetable';
    protected $fillable=[
        'time_id',
        'days',
        'no_of_class',
        'grade_id',
        
    ];

    protected $casts =
   [ 
        // 'days' => 'array',
        // 'no_of_class'=> 'array',
        'grade_id'=> 'array',
   ];

    public function emp_name()
    {
        return $this->hasOne(Employee::class,'id','emp_id');
    }
    public function grade_name()
    {
        return $this->hasOne(Grade::class,'id','grade_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\masters\Grade;
use App\Models\masters\Section;



class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_code',
        'class',
        'section',
        'roll_no',
         'name',
         'email',
         'parent_name',
        'mobile_no',
         'height',
        'weight',
        'father_name',
        'mother_name',
        'address',
        'dob',
        'father_no',
        'mother_no',
        'username',
        'password',
        'image'
    ];

    public function grade_name()
    {
        return $this->hasOne(Grade::class,'id','class');
    }
    public function section1()
    {
        return $this->hasOne(Section::class,'id','section');
    }
}

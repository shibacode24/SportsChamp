<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_code',
        'class',
        'section',
        'roll_no',
         'name',
         'parent_name',
        'mobile_no',
         'height',
        'weight',
        'username',
        'password'
    ];
}

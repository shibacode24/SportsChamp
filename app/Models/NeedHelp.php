<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeedHelp extends Model
{
    use HasFactory;
    protected $table = "need_help";
    protected $fillable = [
        'student_id',
        'user_name',
        'mobile_no',
        'msg'
    ];
}

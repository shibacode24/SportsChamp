<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $table= 'assessment';
    protected $fillable = [
        'grade_id',
        'section_id',
       'file',
    ];
}

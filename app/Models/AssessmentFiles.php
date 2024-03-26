<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentFiles extends Model
{
    use HasFactory;
    protected $table= 'assessment_files';
    protected $fillable = [
        'assessment_excel_id',
        'emp_id',
        'grade_id',
        'section_id',
       'file',
    ];

}
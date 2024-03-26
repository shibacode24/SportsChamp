<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\masters\Grade;
use App\Models\masters\Section;

class Assessment extends Model
{
    use HasFactory;
    protected $table= 'assessment';
    protected $fillable = [
        'excel_id',
        'emp_id',
        'grade_id',
        'section_id',
        'roll_no',
        'name',
        'category',
        'test_name',
        'score',
        'assessment_month',
        'remark',
       'file',
    ];

    public function grade_name()
    {
        return $this->hasOne(Grade::class,'id','grade_id');
    }
    public function section1()
    {
        return $this->hasOne(Section::class,'id','section_id');
    }
    public function excel_file()
    {
        return $this->hasOne(AssessmentFiles::class,'assessment_excel_id','excel_id');
    }
}

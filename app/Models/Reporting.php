<?php

namespace App\Models;

use App\Models\masters\Curriculum;
use App\Models\masters\Grade;
use App\Models\masters\Section;
use App\Models\masters\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast;

class Reporting extends Model
{
    use HasFactory;
    protected $table= 'reporting';
    protected $fillable = [
        'grade_id',
        'emp_id',
        'section_id',
        'curriculum_id',
        'female_kid',
        'male_kid',
        'photo',
        'feedback',
        'remark',
        'classStatus',
        'date',
        'reason',
        'class_type',
        'reason_type',
    ];

    protected $Cast = [
        'photo' => 'array',
    ];

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function curriculum()
    {
        return $this->hasOne(Curriculum::class, 'id', 'curriculum_id');
    }
    public function emp_name()
    {
        return $this->hasOne(Employee::class,'id','emp_id');
    }
}

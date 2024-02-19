<?php

namespace App\Models;
use App\Models\masters\Grade;
use App\Models\masters\Section;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table= 'activity';
    protected $fillable = [
        'grade_id',
        'section_id',
        'category',
        'activity_id',
        'remark',
    ];

    public function grade()
    {
        return $this->hasMany(Grade::class, 'id', 'grade_id');
    }

    public function section()
    {
        return $this->hasMany(Section::class, 'id', 'section_id');
    }
   
}

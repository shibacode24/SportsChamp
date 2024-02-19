<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table= 'skill';
    protected $fillable = [
        'grade_id',
        'skill',
    ];

    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}
}

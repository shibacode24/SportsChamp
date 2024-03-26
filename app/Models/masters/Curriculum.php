<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table= 'curriculum';
    protected $fillable = [
        'name',
        'grade_id'
    ];

    public function grade_name()
    {
        return $this->hasOne(Grade::class,'id','grade_id');
    }
}

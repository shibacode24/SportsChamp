<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table= 'section';
    protected $fillable = [
        'grade_id',
        'section_name',
    ];

    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}
}

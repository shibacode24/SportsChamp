<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade_Card extends Model
{
    use HasFactory;
    protected $table= 'grade_card';
    protected $fillable = [
        'grade_id',
        'grade_content'
        
    ];

    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}
}


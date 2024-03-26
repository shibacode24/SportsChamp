<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessMantra extends Model
{
    use HasFactory;
    protected $table= 'fitness_mantra';
    protected $fillable = [
        'date',
        'title',
        'author_name',
        'image',
        'content',
    ];
}

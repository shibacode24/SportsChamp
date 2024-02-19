<?php

namespace App\Models\masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table= 'grade';
    protected $fillable = [
        'grade'
    ];
}

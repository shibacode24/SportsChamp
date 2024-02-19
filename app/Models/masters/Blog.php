<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table= 'blog';
    protected $fillable = [
        'date',
        'title',
        'author_name',
        'image',
        'content',
    ];
}



<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports_news extends Model
{
    use HasFactory;
    protected $table= 'Sports_news';
    protected $fillable = [
        'date',
        'title',
        'author_name',
        'image',
        'content',
    ];
}

<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yoga_Meditation extends Model
{
    use HasFactory;
    protected $table= 'yoga_meditation';
    protected $fillable = [
        'date',
        'title',
        'video_image',
        'video_link',
    ];
}

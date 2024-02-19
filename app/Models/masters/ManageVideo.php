<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageVideo extends Model
{
    use HasFactory;
    protected $table= 'manage_video';
    protected $fillable = [
        'date',
        'title',
        'video_image',
        'video_link',
    ];
}

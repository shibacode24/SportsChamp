<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsShop extends Model
{
    use HasFactory;
    protected $table= 'sports_shop';
    protected $fillable = [
        'title',
        'image',
    ];
}

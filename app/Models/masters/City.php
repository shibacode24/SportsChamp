<?php

namespace App\Models\masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table= 'city';
    protected $fillable = [
        'city_name'
    ];
}

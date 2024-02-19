<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prop extends Model
{
    use HasFactory;
    protected $table= 'prop';
    protected $fillable = [
        'prop_name'
    ];
}

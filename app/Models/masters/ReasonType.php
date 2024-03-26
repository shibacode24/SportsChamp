<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReasonType extends Model
{
    use HasFactory;
    protected $table= 'reason_type';
    protected $fillable = [
        'reason_name'
    ];
}

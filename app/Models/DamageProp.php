<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamageProp extends Model
{
    use HasFactory;
    protected $table= 'damage_prop';
    protected $fillable = [
        'emp_id',
        'prop_id',
        'quantity',
        'date',
        'reason',
    ];
}

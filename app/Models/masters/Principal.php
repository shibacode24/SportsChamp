<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;
    protected $table= 'principal';
    protected $fillable = [
        'school_id',
        'name',
        'email',
        'contact_no',
        'username',
        'password',
    ];

    public function school_name()
    {
        return $this->hasOne(School::class, 'id','school_id');
    }
}

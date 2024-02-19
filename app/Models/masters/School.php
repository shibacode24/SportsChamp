<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table= 'school';
    protected $fillable = [
        'city_id',
        'date',
        'school_code',
        'school_name',
        'address',
        'contact_person_name',
        'contact_no',
        'email',
        'latitude',
        'longitude',
    ];
    public function city_name()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

}

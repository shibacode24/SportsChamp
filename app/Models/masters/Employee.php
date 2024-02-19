<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employee";
    protected $fillable = [
        'city_id',
        'designation_id',
        'date',
        'emp_code',
        'school_id',
        'name',
        'address',
        'contact_no',
        'email',
        'pincode',
        'username',
        'password',
    ];

    public function school_name()
    {
        return $this->hasOne(School::class, 'id', 'school_id');
    }
    
    public function city_name()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function designation_name()
    {
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }
}

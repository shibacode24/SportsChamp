<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table= 'vendor';
    protected $fillable = [
        'vendor_name',
        'mobile',
        'city_id',
        'email',
    ];
    public function cityName()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}

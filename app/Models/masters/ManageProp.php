<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageProp extends Model
{
    use HasFactory;
    protected $table= 'manage_prop';
    protected $fillable = [
        'date',
        'vendor_id',
];

    public function vendor_name()
{
    return $this->hasOne(Vendor::class, 'id', 'vendor_id');
}


}

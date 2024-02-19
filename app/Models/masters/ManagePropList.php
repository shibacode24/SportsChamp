<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagePropList extends Model
{
    use HasFactory;
    protected $table= 'manage_prop_list';
    protected $fillable=[
        'manage_prop_id',
        'prop_id',
        'quntity'
    ];

    public function prop_name()
{
    return $this->hasOne(Prop::class, 'id', 'prop_id');
}

}

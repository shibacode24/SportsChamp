<?php
namespace App\Models\masters;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table= 'designation';
    protected $fillable = [
        'designation'
    ];
}

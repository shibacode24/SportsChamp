<?php

namespace App\Models;

use App\Models\masters\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table= 'attendance';
    protected $fillable = [
        'emp_id',
        'date',
        'time',
        'in_out',
    ];
    public function emp_name()
    {
        return $this->hasOne(Employee::class,'id','emp_id');
    }
}

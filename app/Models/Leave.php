<?php

namespace App\Models;
use App\Models\masters\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table= 'leave';
    protected $fillable = [
        'emp_id',
        'leave_type',
        'from_date',
        'to_date',
        'reason',
        'admin_remark',
        'status',
    ];

    public function emp_name()
    {
        return $this->hasOne(Employee::class , 'id','emp_id');
    }
}

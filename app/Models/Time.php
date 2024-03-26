<?php

namespace App\Models;
use App\Models\masters\Employee;
use App\Models\masters\Grade_Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $table = 'time';
    protected $fillable=[
        'emp_id',
    ];
    public function emp_name()
    {
        return $this->hasOne(Employee::class,'id','emp_id');
    }
    public function grade_name()
    {
        return $this->hasOne(Grade_Card::class,'id','grade_id');
    }
    public function time_table()
    {
        return $this->hasMany(TimeTable::class,'id','time_id');
    }
}

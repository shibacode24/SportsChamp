<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueProp extends Model
{
    use HasFactory;
    protected $table= 'issue_prop';
    protected $fillable = [
        'date',
        'emp_code',
        'school_code',
        ];

            public function emp_name1()
        {
            return $this->hasMany(Employee::class, 'id', 'emp_code');
        }

        public function school_name1()
        {
            return $this->hasOne(School::class, 'id', 'school_code');
        }

        public function prop_name()
        {
            return $this->hasOne(Prop::class, 'id', 'prop_id');
        }
}

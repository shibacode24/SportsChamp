<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
    use HasFactory;
    protected $table= 'fitness';
    protected $fillable = [
        'grade_id',
        'test_id',
        'test_battery',
    ];

    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}

public function test_name()
{
    return $this->hasOne(TestComponent::class, 'id', 'test_id');
}
}

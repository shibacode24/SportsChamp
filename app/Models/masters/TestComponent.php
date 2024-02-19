<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestComponent extends Model
{
    use HasFactory;
    protected $table= 'test_component';
    protected $fillable = [
        // 'test_id',
        'name_of_test_components',
    ];
    
    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}
}

<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityMaster extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table= 'activity_master';
    protected $fillable = [
        'grade_id',
        'category_id',
        'activity',
    ];
    public function grade_name()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

    public function category_name()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

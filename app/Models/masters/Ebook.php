<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $table= 'ebook';
    protected $fillable = [
        'grade_id', 
        'title',
        'image',
        
    ];

    public function grade_name()
{
    return $this->hasOne(Grade::class, 'id', 'grade_id');
}
public function ebook_list_name()
{
    return $this->hasOne(Ebook_List::class, 'ebook_id', 'id');
}
}
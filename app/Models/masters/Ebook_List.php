<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook_List extends Model
{
    use HasFactory;
    protected $table= 'ebook_list';
    protected $fillable = [
        'page_no', 
        'capter_name',
        'image'
        
    ];
}

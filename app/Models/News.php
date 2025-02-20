<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'image_url',
        'image_caption',
        'date',
        'views',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'title',
        'content',
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
}

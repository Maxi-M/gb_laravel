<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'category_id', 'text', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }
}

<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['text', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}

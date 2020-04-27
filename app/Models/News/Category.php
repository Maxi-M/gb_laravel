<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['text', 'slug', 'is_active', 'rss'];
    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules(): array
    {
        return [
            'text' => ['required', 'min:3', 'max:20'],
            'slug' => ['required', 'regex:/^[A-Za-z0-9\-]+$/'],
            'is_active' => ['boolean'],
            'rss' => ['url', 'max:255'],
        ];
    }

    public static function attributeNames(): array
    {
        return [
            'text' => 'Название категории',
            'slug' => 'Название категории транслитом'
        ];
    }
}

<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['text', 'slug'];
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

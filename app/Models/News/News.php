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

    public static function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:50'],
            'text' => ['required', 'min:15'],
            'category_id' => 'exists:categories,id',
            'image' => ['mimes:jpeg,bmp,png', 'max:5120']
        ];
    }

    public static function attributeNames(): array
    {
        return [
            'title' => 'Заголовок статьи',
            'text' => 'Содержание статьи',
            'category_id' => 'Категория',
            'image' => 'Картинка'
        ];
    }
}

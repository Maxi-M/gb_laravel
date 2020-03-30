<?php


namespace App\Models\News;


use Illuminate\Support\Str;

class Category
{
    private static $categories = [
        1 => [
            'id' => 1,
            'text' => 'Политика'
        ],
        2 => [
            'id' => 2,
            'text' => 'Искусство'
        ],
        3 => [
            'id' => 3,
            'text' => 'Спорт'
        ],
    ];

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryId(int $id): ?array
    {
        return static::getCategories()[$id] ?? null;
    }

    public static function getCategoryBySlug(string $slug): ?array
    {
        foreach (static::getCategories() as $item) {
            if (Str::slug($item['text']) === $slug) {
                return $item;
            }
        }
        return null;
    }
}

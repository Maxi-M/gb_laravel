<?php


namespace App;


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

    public static function getCategoryByName(string $category_name): ?array
    {
        foreach (static::getCategories() as $item) {
            if (mb_strtolower($item['text']) === mb_strtolower($category_name)) {
                return $item;
            }
        }
        return null;
    }
}

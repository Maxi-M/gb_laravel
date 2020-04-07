<?php


namespace App\Models\News;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Category
{
    public static function getCategories()
    {
        return json_decode(File::get(storage_path().'/categories.json'), true);
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

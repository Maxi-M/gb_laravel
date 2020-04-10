<?php


namespace App\Models\News;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Category
{
    public static function getCategories()
    {
        return DB::table('categories')->get()->all();
    }

    public static function getCategoryId(int $id): ?array
    {
        return DB::table('categories')->get()->where('id', $id)->all();
    }

    public static function getCategoryBySlug(string $slug): ?array
    {
        return DB::table('categories')->get()->where('slug', $slug)->all();
    }
}

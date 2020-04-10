<?php

namespace App\Models\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class News
{
    public $id;
    public int $category_id;
    public string $title;
    public string $text;
    public string $image;

    public static function getNews()
    {
        return DB::table('news')->get()->all();
    }

    public static function getNewsId(int $id): ?array
    {
        return DB::table('news')->get()->where('id', $id)->all();
    }

    public static function getNewsByCategoryId(int $id): array
    {
        return DB::table('news')->get()->where('category_id', $id)->all();
    }

    public function load(Request $request): bool
    {
        $url = null;

        if ($file = $request->file('image')) {
            $path = Storage::putFile('public/images', $file);
            $url = Storage::url($path);
        }

        $this->id = $request->id ?? null;
        $this->title = $request->title;
        $this->text = $request->text;
        $this->category_id = $request->category_id;
        $this->image = $url;

        return true;
    }

    public function save(): bool
    {

        DB::table('news')->insert([
            'category_id' => $this->category_id,
            'image' => $this->image,
            'title' => $this->title,
            'text' => $this->text
        ]);

        return true;
    }
}

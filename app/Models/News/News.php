<?php

namespace App\Models\News;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class News
{
    public $id;
    public int $category_id;
    public string $title;
    public string $text;

    public static function getNews()
    {
        return json_decode(File::get(storage_path().'/news.json'), true);
    }

    public static function getNewsId(int $id): ?array
    {
        return static::getNews()[$id] ?? null;
    }

    public static function getNewsByCategoryId(int $id): array
    {
        $result = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] === $id) {
                $result[] = $item;
            }
        }
        return $result;
    }

    public function load(Request $request): bool
    {
        $this->id = $request->id ?? null;
        $this->title = $request->title;
        $this->text = $request->text;
        $this->category_id = $request->category_id;

        return true;
    }

    public function save(): bool
    {
        $data = static::getNews();
        $this->id = $this->id ?? array_key_last($data) + 1;
        $data[] = [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'text' => $this->text
        ];
        File::put(storage_path().'/news.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return true;
    }
}

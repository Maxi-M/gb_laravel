<?php

namespace App;

class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!'
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости((('
        ],
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId(int $id): ?array
    {
        return static::getNews()[$id] ?? null;
    }
}

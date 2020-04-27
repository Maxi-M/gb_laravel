<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        return [
            [
                'text' => 'Политика',
                'slug' => Str::slug('Политика'),
                'rss' => 'https://news.yandex.ru/politics.rss',
                'is_active' => true
            ],
            [
                'text' => 'Культура',
                'slug' => Str::slug('Культура'),
                'rss' => 'https://news.yandex.ru/culture.rss',
                'is_active' => true
            ],
            [
                'text' => 'Спорт',
                'slug' => Str::slug('Спорт'),
                'rss' => 'https://news.yandex.ru/sport.rss',
                'is_active' => true
            ],
            [
                'text' => 'Армия и оружие',
                'slug' => Str::slug('Армия и оружие'),
                'rss' => 'https://news.yandex.ru/army.rss',
                'is_active' => true
            ],
        ];
    }
}

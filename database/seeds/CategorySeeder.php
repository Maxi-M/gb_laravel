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
            ['text' => 'Политика', 'slug' => Str::slug('Политика')],
            ['text' => 'Спорт', 'slug' => Str::slug('Спорт')],
            ['text' => 'Искусство', 'slug' => Str::slug('Искусство')],
            ['text' => 'Культура', 'slug' => Str::slug('Культура')]
        ];
    }
}

<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');

        $data = [];
        for ($i = 1; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(random_int(10, 30)),
                'category_id' => random_int(1,4),
                'text' => $faker->realText(random_int(1000,3000)),
            ];
        }

        return $data;
    }
}

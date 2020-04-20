<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.ru',
            'password' => Hash::make('111'),
            'is_admin' => true,
        ]);

        for ($i = 1; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('111'),
            ]);
        }
    }
}

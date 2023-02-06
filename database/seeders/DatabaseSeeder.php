<?php

namespace Database\Seeders;

use App\Models\province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Configuration::factory(1)->create();
        \App\Models\User::factory(1)->create();


        $provinces = [
            ['ref' => 'P1', 'name' => 'Bengo'],
            ['ref' => 'P2', 'name' => 'Benguela'],
            ['ref' => 'P3', 'name' => 'Bié'],
            ['ref' => 'P4', 'name' => 'Cabinda'],
            ['ref' => 'P5', 'name' => 'Cuando-Cubango'],
            ['ref' => 'P6', 'name' => 'Cuanza Norte'],
            ['ref' => 'P7', 'name' => 'Cuanza Sul'],
            ['ref' => 'P8', 'name' => 'Cunene'],
            ['ref' => 'P9', 'name' => 'Huambo'],
            ['ref' => 'P10', 'name' => 'Huíla'],
            ['ref' => 'P11', 'name' => 'Luanda'],
            ['ref' => 'P12', 'name' => 'Lunda Norte'],
            ['ref' => 'P13', 'name' => 'Lunda Sul'],
            ['ref' => 'P14', 'name' => 'Malanje'],
            ['ref' => 'P15', 'name' => 'Moxico'],
            ['ref' => 'P16', 'name' => 'Namibe'],
            ['ref' => 'P17', 'name' => 'Uíge'],
            ['ref' => 'P18', 'name' => 'Zaire'],
        ];

        foreach ($provinces as $value) {
            province::create($value);
        }
    }
}

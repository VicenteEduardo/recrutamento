<?php

namespace Database\Factories;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConfigurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Configuration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => "Luanda/Angola",
            'email' => "Aqui vai o email",
            'telefone' => "Aqui vai os telefones separados por uma barra(/)",
            'facebook' => "Aqui vai o facebook(/)",
            'youtube' => "Aqui vai o canal do youtub(/)",
            'linkedin' => "Aqui vai o linkdin(/)",
            'whatssap' => "Aqui vai o whatssap(/)",
           'telefone' => "Aqui vai os telefones separados por uma barra(/)"
        ];


    }
}

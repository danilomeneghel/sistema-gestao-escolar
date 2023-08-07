<?php

namespace Database\Factories;

use App\Models\Escola;
use Illuminate\Database\Eloquent\Factories\Factory;

class EscolaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Escola::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'       => $this->faker->firstName(),
            'logradouro' => $this->faker->streetName(),
            'numero'     => $this->faker->buildingNumber(),
            'bairro'     => $this->faker->citySuffix(),
            'cidade'     => $this->faker->city(),
            'cep'        => $this->faker->randomNumber(8, true),
            'estado'     => $this->faker->stateAbbr()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Materia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->randomNumber(5, true),
            'nome' => $this->faker->randomElements(['Português', 'Matemática', 'Química', 'Física', 'Biologia'])[0]
        ];
    }
}

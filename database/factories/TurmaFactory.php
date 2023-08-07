<?php

namespace Database\Factories;

use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

class TurmaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Turma::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'escola_id' => Escola::factory(),
            'turno'     => $this->faker->randomElements(['Manhã','Tarde','Noite'])[0],
            'serie'     => $this->faker->numberBetween(1, 9).'º',
            'nivel'     => $this->faker->randomElements(['Fundamental','Médio'])[0],
            'ano'       =>$this->faker->year()
        ];
    }
}

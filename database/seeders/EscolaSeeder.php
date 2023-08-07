<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class EscolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Escola::factory()
         *   ->count(1)
         *   ->has(Turma::factory()->count(3))    
         *   ->create();
         */
          Escola::factory(15)->create();
    }
}

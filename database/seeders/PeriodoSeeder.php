<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::factory(15)->create();
    }
}

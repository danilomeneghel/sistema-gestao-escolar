<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Administrador',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2a$10$1HAxsgoqtXCVASxpXGcnheACN8.SbB8iQZ5o4sktAOPQEE/k2B9Ue'
        ]);
    }
}

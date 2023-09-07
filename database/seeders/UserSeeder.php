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
            'password' => '$2a$10$yrQnZeGiL7wLztZyRAW2fOg253YSziqDmSqJrIQlvo2iKHwNkQlE2'
        ]);
    }
}

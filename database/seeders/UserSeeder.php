<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'email' => 'administrador@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('administrador2022'),
        ])->assignRole('admin');

       User::factory()->create()->assignRole('user');
    }
}

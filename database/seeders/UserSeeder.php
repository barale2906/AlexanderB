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
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('administrador2022'),
        ]);

       // $user->assignRole('admin');

        User::factory(10)->create();
    }
}

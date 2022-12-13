<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('anexos');
        Storage::makeDirectory('anexos');
        
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            BookSeeder::class,
            BookLoanSeeder::class,
            MessageSeeder::class,
            //AnnexeSeeder::class,
        ]);
    }
}

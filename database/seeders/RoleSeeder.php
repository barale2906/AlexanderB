<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name'=>'user']);

        Permission::create(['name' => 'book'])->assignRole($admin);

        Permission::create(['name' => 'bookLoan'])->assignRole($admin);

        Permission::create(['name' => 'message'])->syncRoles([$admin,$user]);

        Permission::create(['name' => 'user'])->syncRoles([$admin,$user]);

        Permission::create(['name' => 'annexe'])->syncRoles([$admin,$user]);
                
    }
}

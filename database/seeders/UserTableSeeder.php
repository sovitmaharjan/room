<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $role = Role::find(1);
        $admin->assignRole($role);

        $admin = User::create([
            'name' => 'customer',
            'email' => 'customer@customer.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $role = Role::find(2);
        $admin->assignRole($role);
    }
}

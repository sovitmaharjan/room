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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $role = Role::find(1);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'customer',
            'email' => 'customer@customer.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $role = Role::find(2);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'customer 2',
            'email' => 'customer2@customer2.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'customer 3',
            'email' => 'customer3@customer3.com',
            'email_verified_at' => now(),
            'password' => bcrypt('P@ssw0rd')
        ]);
        $user->assignRole($role);
    }
}

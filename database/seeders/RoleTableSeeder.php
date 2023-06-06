<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'customer'
        ]);
    }
}

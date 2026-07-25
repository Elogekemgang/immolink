<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);

        Role::firstOrCreate(['name' => 'landlord']);

        Role::firstOrCreate(['name' => 'tenant']);

        Role::firstOrCreate(['name' => 'bailiff']);
    }
}
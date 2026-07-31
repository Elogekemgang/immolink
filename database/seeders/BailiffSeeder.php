<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BailiffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bailiff = User::firstOrCreate(

            [
                'email' => 'huissier@immolink.com'
            ],

            [
                'name' => 'Maître Alain Ndzi',
                'password' => Hash::make('password'),
                'user_type' => 'bailiff',
            ]

        );

        $bailiff->assignRole('bailiff');
    }
}
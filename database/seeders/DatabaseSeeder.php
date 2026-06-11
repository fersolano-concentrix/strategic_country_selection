<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'System Administrator',
            'email' => 'admin@concentrix.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'طه حاجی وند',
            'email' => 'hajivandtaha@example.com',
            'password' => Hash::make('1234'),
            'email_verified_at' => now(),
        ]);

        // Additional test users
        // User::factory()->count(10)->create();
    }
}
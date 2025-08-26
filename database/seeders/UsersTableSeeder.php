<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->phoneNumber,
                'password' => Hash::make('password123'), // Default password for testing
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert a specific user for testing
        DB::table('users')->insert([
            'first_name' => 'طه',
            'last_name' => 'حاجی وند',
            'email' => 'hajivandtaha@gmail.com',
            'phone' => '09361629708',
            'password' => Hash::make('1234321'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user1 = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'date_of_birth' => '1980-01-01',
            'gender' => 'male',
            'email' => 'admin@example.test',
            'password' => bcrypt('admin12345'),
        ]);
        $user2= User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password123'),
        ]);

        $user3 = User::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'date_of_birth' => '1985-05-15',
            'gender' => 'female',
            'email' => 'jane.smith@example.com',
            'password' => bcrypt('password123'),
        ]);

        return [$user1, $user2,$user3];
    }
}

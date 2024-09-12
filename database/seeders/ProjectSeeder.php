<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Retrieve existing users
          $user1 = User::firstOrCreate([
            'email' => 'john.doe@example.com'
        ], [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'password' => bcrypt('password123'),
        ]);

        $user2 = User::firstOrCreate([
            'email' => 'jane.smith@example.com'
        ], [
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'date_of_birth' => '1985-05-15',
            'gender' => 'female',
            'password' => bcrypt('password123'),
        ]);

        $project1 = Project::create([
            'name' => 'Project Alpha',
            'department' => 'Development',
            'start_date' => '2024-01-01',
            'end_date' => '2024-06-01',
            'status' => 'ongoing',
        ]);

        $project2 = Project::create([
            'name' => 'Project Beta',
            'department' => 'Marketing',
            'start_date' => '2024-03-01',
            'end_date' => '2024-09-01',
            'status' => 'completed',
        ]);

        // Attach users to projects
        $project1->users()->attach($user1); // Attach John to Project Alpha
        $project1->users()->attach($user2); // Attach Jane to Project Alpha
        $project2->users()->attach($user2); // Attach Jane to Project Beta
    }
}

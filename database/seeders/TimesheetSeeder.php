<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Timesheet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::where('email', 'john.doe@example.com')->first();
        $user2 = User::where('email', 'jane.smith@example.com')->first();
        $project1 = Project::where('name', 'Project Alpha')->first();
        $project2 = Project::where('name', 'Project Beta')->first();

        Timesheet::create([
            'user_id' => $user1->id,
            'project_id' => $project1->id,
            'task_name' => 'Development Task 1',
            'date' => '2024-01-05',
            'hours' => 5,
        ]);

        Timesheet::create([
            'user_id' => $user2->id,
            'project_id' => $project2->id,
            'task_name' => 'Marketing Task 1',
            'date' => '2024-03-10',
            'hours' => 4,
        ]);
    }
}

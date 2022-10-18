<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function($user) {
            $user->tasks()
                ->saveMany( Task::factory(4)->create([
                    'user_id' => $user->id
                ]) );
        });
    }
}

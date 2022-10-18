<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{

    public function run(): void
    {
         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@transdoc.com',
         ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@transdoc.com',
        ]);
    }
}

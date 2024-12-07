<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Report;
use App\Models\feedback;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\violence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(20)->create();
        Feedback::factory(20)->create();
        Post::factory(20)->create();
        violence::factory(1)->create();
        Report::factory(20)->create();

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}

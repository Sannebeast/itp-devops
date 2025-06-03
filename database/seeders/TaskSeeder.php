<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    private $data = [
        [
            'title' => 'Write a love letter to Laravel',
            'description' => 'Compose a heartfelt love letter to Laravel, explaining how it has revolutionized your coding life. Express your deep affection for eloquent relationships and artisan commands.',
            'priority' => 3,
            'state' => 'new',
            'time_estimated'=> 15,
            'time_spent' => 0,
            'completed_at' => NULL
        ],
        [
            'title' => 'Have a debate with a coding error',
            'description' => 'Engage in a passionate debate with a coding error in your Laravel project. Argue your case for why it should work, and listen to its "arguments" for why it will not.',
            'priority' => 2,
            'state' => 'completed',
            'time_estimated'=> 10,
            'time_spent' => 35,
            'completed_at' => '2023-09-20 14:50:00'
        ],
        [
            'title' => 'Conduct a Laravel Bake-Off',
            'description' => 'Challenge yourself to a Laravel Bake-Off where you create different Laravel projects with unusual names like "CakeBoss" and "CookieMonsta." See which one turns out the most delicious.',
            'priority' => 4,
            'state' => 'in progress',
            'time_estimated'=> 30,
            'time_spent' => 4,
            'completed_at' => NULL
        ],
        [
            'title' => 'Create a Migration for your sock drawer',
            'description' => 'Generate a Laravel migration to organize and maintain your sock drawer. Make sure your sock "schema" is well-structured and relationships between socks are eloquent.',
            'priority' => 1,
            'state' => 'completed',
            'time_estimated'=> 5,
            'time_spent' => 10,
            'completed_at' => '2023-07-10 17:55:00'
        ],
        [
            'title' => 'Build a Laravel Artisan shrine',
            'description' => 'Construct a small shrine to the Laravel Artisan command in your workspace. Pray to it daily for quick and bug-free migrations and seedings.',
            'priority' => 2,
            'state' => 'in progress',
            'time_estimated'=> 45,
            'time_spent' => 37,
            'completed_at' => NULL
        ],
        [
            'title' => 'Laravel Task Scheduler Challenge',
            'description' => 'Configure a task scheduler to automatically water your real plants, name them "Lara," and have them thank you in a log file.',
            'priority' => 3,
            'state' => 'on hold',
            'time_estimated'=> 20,
            'time_spent' => 0,
            'completed_at' => NULL
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->data as $item) {
            Task::create($item);
        }
    }
}

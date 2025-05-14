<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Work;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WorkApplication;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for ($i = 0; $i < 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            Work::factory()->create([
                'employer_id' => $employers->random()->id
            ]);
        }

        foreach ($users as $user) {
            $works = Work::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($works as $work) {
                WorkApplication::factory()->create([
                    'work_id' => $work->id,
                    'user_id' => $user->id,
                ]);
            }
        }
        //Work::factory(100)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

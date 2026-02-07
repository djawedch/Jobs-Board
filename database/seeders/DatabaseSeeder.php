<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Create all unique tags FIRST
        $tagNames = ['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React', 'Node.js', 'Python', 'DevOps', 'Frontend', 'Backend'];
        
        $tags = collect();
        foreach ($tagNames as $tagName) {
            $tags->push(Tag::firstOrCreate(['name' => $tagName]));
        }

        $users = User::factory(10)->create();
        $employerUsers = $users->random(5);

        foreach ($employerUsers as $user) {
            $user->update(['role' => 'employer']);

            $employer = Employer::factory()->create([
                'user_id' => $user->id,
                'name' => $user->name . "'s Company",
            ]);

            Job::factory(3)->create([
                'employer_id' => $employer->id,
            ])->each(function ($job) use ($tags) {
                $job->tags()->attach(
                    $tags->random(rand(1, 3))->pluck('id')
                );
            });
        }
        
        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('👥 Users: ' . User::count());
        $this->command->info('🏢 Employers: ' . Employer::count());
        $this->command->info('💼 Jobs: ' . Job::count());
        $this->command->info('🏷️ Tags: ' . Tag::count());
    }
}
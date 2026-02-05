<?php

namespace Database\Seeders;

use App\Models\{Job, Tag};
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $tags = Tag::factory(3)->create();

        Job::factory(10)->hasAttached($tags)->create();
    }
}

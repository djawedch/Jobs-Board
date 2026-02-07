<?php

namespace Database\Factories;

use App\Models\{Employer, Job};
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->numberBetween(30000, 120000),
            'location' => $this->faker->city(),
            'schedule' => $this->faker->randomElement(['Full Time', 'Part Time']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\{User, Employer};
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    protected $model = Employer::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company(),
            'logo' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'student_id' => User::where('role', 'student')->inRandomOrder()->first()->id,
            'supervisor_id' => User::where('role', 'supervisor')->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['proposed', 'in_progress', 'completed']),
        ];
    }
}

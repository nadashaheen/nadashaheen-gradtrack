<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'supervisor_id' =>  User::where('role', 'supervisor')->inRandomOrder()->first()->id,
            'score' => $this->faker->numberBetween(0, 100),
            'feedback' => $this->faker->sentence(),
        ];
    }
}

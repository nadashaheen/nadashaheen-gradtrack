<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'stage_id' => ProjectStage::factory(),
            'student_id' => User::where('role', 'student')->inRandomOrder()->first()->id,
            'file_path' => 'submissions/' . $this->faker->uuid() . '.pdf',
            'comments' =>  $this->faker->sentence(),
        ];
    }
}

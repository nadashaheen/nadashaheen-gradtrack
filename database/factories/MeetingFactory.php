<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meeting>
 */
class MeetingFactory extends Factory
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
            'title' => $this->faker->sentence(3),
            'meeting_date' => $this->faker->date(),
            'meeting_time' => $this->faker->time(),
            'meeting_link' => $this->faker->url(),
        ];
    }
}

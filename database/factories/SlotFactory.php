<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_id' => Activity::factory(),
            'timing' => fake()->word,
            'day' => fake()->randomElement(['monday','tuesday','wednesday','thursday','friday','saturday','sunday']),
            'starts_at' => fake()->time(),
            'ends_at' => fake()->time(),
            'no_of_slots' => fake()->numberBetween(1, 10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hostel_id' => Hostel::factory(),
            'number' => $this->faker->unique()->randomNumber(6),
            'type' => $this->faker->randomElement(['single', 'double']),
            'availability' => $this->faker->boolean,
        ];
    }
}

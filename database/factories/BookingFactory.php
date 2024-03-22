<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $check_in = $this->faker->dateTimeBetween('+1 week', '+2 week');
        $check_out = (clone $check_in)->modify('+'.rand(1, 4).' days');

        return [
            'user_id' => User::factory(),
            'room_id' => Room::factory(),
            'check_in' => $check_in,
            'check_out' => $check_out,
            'number_of_occupants' => rand(1, 4),
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripUser>
 */
class TripUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trip_id' => Trip::inRandomOrder()->first()->id ?? null,
            'user_id' => User::inRandomOrder()->first()->id ?? null,
        ];
    }
}

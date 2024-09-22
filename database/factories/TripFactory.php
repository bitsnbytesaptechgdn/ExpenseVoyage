<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? null,  // Fetch random user or null if none exist
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),  // Add description
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'image' => null,  // Placeholder image URL
            'total_budget' => $this->faker->randomFloat(2, 100, 10000),  // Budget between 100 and 10,000
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\category;
// use database\factories\category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\learning_data>
 */
class learning_dataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(6),
            'studyhour' => $this->faker->numberBetween(1, 60),
            'month' => $this->faker->date('Y-m-d'),
            'category_id' => category::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

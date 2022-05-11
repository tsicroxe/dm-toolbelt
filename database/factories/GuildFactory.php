<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->randomHtml(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

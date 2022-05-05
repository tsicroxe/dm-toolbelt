<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Race;

class RaceFactory extends Factory
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
            'walking_speed' => $this->faker->randomElement(['25', '30']),
            'asi' => 'Your Strength score increases by 2, and your Charisma score increases by 1.',
            'size' => $this->faker->randomElement([Race::SIZE_SMALL, Race::SIZE_MEDIUM]),
            'size_description' => $this->faker->paragraph(),
            'age' => $this->faker->paragraph(),
            'str_bonus' => $this->faker->numberBetween(0, 2),
            'dex_bonus' => $this->faker->numberBetween(0, 2),
            'con_bonus' => $this->faker->numberBetween(0, 2),
            'int_bonus' => $this->faker->numberBetween(0, 2),
            'wis_bonus' => $this->faker->numberBetween(0, 2),
            'cha_bonus' => $this->faker->numberBetween(0, 2),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}

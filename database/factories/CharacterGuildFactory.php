<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CharacterGuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'character_id' => Character::class,
            'guild_id' => $this->faker->numberBetween(1, 9),
            'level' => $this->faker->numberBetween(1, 20)
        ];
    }
}

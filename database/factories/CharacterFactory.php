<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'race_id' => null,
            'name' => $this->faker->name(),
            'level' => $this->faker->numberBetween(1, 20)

        ];
    }
}

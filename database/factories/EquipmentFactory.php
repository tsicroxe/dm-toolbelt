<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word . $this->faker->numberBetween(1, 1000000),
            'description' => $this->faker->paragraph,
            'type' => $this->faker->word,
            'cost' => $this->faker->numberBetween(0, 1000),
            'weight' => $this->faker->numberBetween(0, 1000),
            'attribute' => $this->faker->word
        ];
    }
}

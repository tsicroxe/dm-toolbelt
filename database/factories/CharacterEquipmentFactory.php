<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterEquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'character_id' => Character::factory()->create()->id,
            'equipment_id' => Equipment::factory()->create()->id,
            'quantity' => $this->faker->numberBetween(1, 5)
        ];
    }
}

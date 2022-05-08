<?php

namespace Database\Factories;

use App\Models\Spell;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpellFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word. $this->faker->name . $this->faker->word,
            'description' => $this->faker->paragraph(),
            'level' => $this->faker->numberBetween(0, 9),
            'cast_time' => $this->faker->randomElement(Spell::ALLOWED_CAST_TIMES),
            'duration' => $this->faker->randomElement(Spell::ALLOWED_DURATIONS),
            'school' => $this->faker->randomElement(Spell::ALLOWED_SCHOOLS),
            'range_area' => $this->faker->randomElement(Spell::ALLOWED_RANGE_AREA) . $this->faker->randomElement([' cone', ' area']),
            'components' => implode(', ', $this->faker->randomElements(Spell::ALLOWED_COMPONENTS, $this->faker->numberBetween(1, 3))),
            'material_component' => $this->faker->sentence(),
            'attack_save' => $this->faker->randomElement(Spell::ALLOWED_ATTACK_SAVE),
            'damage_type' => $this->faker->randomElement(Spell::ALLOWED_DAMAGE_TYPES),
            'higher_level' => $this->faker->sentence
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Character;
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
            'level' => $this->faker->numberBetween(1, 20),
            'current_hp' => $this->faker->numberbetween(0, 10),
            'max_hp' => $this->faker->numberBetween(10, 20),
            'str_score' => $this->faker->numberBetween(1, 20),
            'dex_score' => $this->faker->numberBetween(1, 20),
            'con_score' => $this->faker->numberBetween(1, 20),
            'int_score' => $this->faker->numberBetween(1, 20),
            'wis_score' => $this->faker->numberBetween(1, 20),
            'cha_score' => $this->faker->numberBetween(1, 20),

            'acrobatics' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'animal_handling' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'arcana' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'athletics' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'deception' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'history' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'insight' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'intimidation' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'investigation' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'medicine' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'nature' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'perception' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'performance' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'persuasion' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'religion' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'sleight_of_hand' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'stealth' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),
            'survival' => $this->faker->randomElement(Character::ALLOWED_SKILL_VALUES),


        ];
    }
}

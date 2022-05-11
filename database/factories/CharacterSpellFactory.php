<?php

namespace Database\Factories;

use App\Models\Character;
use App\Models\Spell;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterSpellFactory extends Factory
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
            'spell_id' => Spell::factory()->create()->id,
        ];
    }
}

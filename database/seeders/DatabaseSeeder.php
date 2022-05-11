<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterGuild;
use App\Models\Equipment;
use App\Models\Spell;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(['email' => 'test@test.com', 'password' => bcrypt('password')]);
        $character = Character::factory()->create(['user_id' => $user->id, 'race_id' => null]);
        CharacterGuild::factory()->create(['character_id' => $character->id]);

        Equipment::factory()->count(500)->create();
        Equipment::factory()->create([
            'name' => 'Longsword',
            'description' => 'Proficiency with a longsword allows you to add your proficiency bonus to the attack roll for any attack you make with it.',
            'type' => 'Marshal Melee Weapon',
            'attribute' => 'Slashing',
            'cost' => '100',
            'weight' => 5,
            'ac_bonus' => 0
        ]);

        Equipment::factory()->create([
            'name' => 'Leather Armor',
            'description' => 'Proficiency with a longsword allows you to add your proficiency bonus to the attack roll for any attack you make with it.',
            'type' => 'Marshal Melee Weapon',
            'attribute' => 'Slashing',
            'cost' => '100',
            'weight' => 5,
            'ac_bonus' => 1
        ]);

        Spell::factory()->count(500)->create();
        Spell::factory()->create([
            'name' => 'Fireball',
            'description' => "A bright streak flashes from your pointing finger to a point you choose within range and then blossoms with a low roar into an explosion of flame. Each creature in a 20-foot-radius sphere centered on that point must make a Dexterity saving throw. A target takes 8d6 fire damage on a failed save, or half as much damage on a successful one. The fire spreads around corners. It ignites flammable objects in the area that aren't being worn or carried.",
            'level' => 3,
            'concentration' => false,
            'ritual' => false,
            'cast_time' => '1 Action',
            'duration' => 'Instantaneous',
            'school' => 'Evocation',
            'range_area' => '150ft (20 ft cube)',
            'components' => 'V, S, M',
            'material_component' => 'a tiny ball of bat guano and sulfur',
            'attack_save' => 'Dex save',
            'damage_type' => 'Fire',
            'higher_level' => "When you cast this spell using a spell slot of 4th level or higher, the damage increases by 1d6 for each slot level above 3rd."
        ]);

    }
}

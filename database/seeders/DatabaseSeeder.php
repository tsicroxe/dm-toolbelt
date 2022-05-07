<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterGuild;
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
    }
}

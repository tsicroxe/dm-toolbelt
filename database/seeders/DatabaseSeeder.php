<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterGuild;
use App\Models\Equipment;
use App\Models\Guild;
use App\Models\Race;
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

        Guild::factory()->create(['name' => 'Barbarian']);
        Guild::factory()->create(['name' => 'Bard']);
        Guild::factory()->create(['name' => 'Cleric']);
        Guild::factory()->create(['name' => 'Druid']);
        Guild::factory()->create(['name' => 'Fighter']);
        Guild::factory()->create(['name' => 'Monk']);
        Guild::factory()->create(['name' => 'Paladin']);
        Guild::factory()->create(['name' => 'Ranger']);
        Guild::factory()->create(['name' => 'Rogue']);
        Guild::factory()->create(['name' => 'Sorcerer']);
        Guild::factory()->create(['name' => 'Warlock']);
        Guild::factory()->create(['name' => 'Wizard']);

        CharacterGuild::factory()->create(['character_id' => $character->id, 'guild_id' => Guild::inRandomOrder()->first()->id]);

        Race::factory()->create([
                'name' => 'Dragonborn',
                'description' => '
                    <p>Born of dragons, as their name proclaims, the dragonborn walk proudly through a world that greets them with fearful incomprehension. Shaped by draconic gods or the dragons themselves, dragonborn originally hatched from dragon eggs as a unique race, combining the best attributes of dragons and humanoids. Some dragonborn are faithful servants to true dragons, others form the ranks of soldiers in great wars, and still others find themselves adrift, with no clear calling in life.</p>
                    <br>
                    <h3><b>Proud Dragon Kin</b></h3>
                    <br>
                    <p>Dragonborn look very much like dragons standing erect in humanoid form, though they lack wings or a tail. The first dragonborn had scales of vibrant hues matching the colors of their dragon kin, but generations of interbreeding have created a more uniform appearance. Their small, fine scales are usually brass or bronze in color, sometimes ranging to scarlet, rust, gold, or copper-green. They are tall and strongly built, often standing close to 6½ feet tall and weighing 300 pounds or more. Their hands and feet are strong, talonlike claws with three fingers and a thumb on each hand.</p>
                    <p>The blood of a particular type of dragon runs very strong through some dragonborn clans. These dragonborn often boast scales that more closely match those of their dragon ancestor—bright red, green, blue, or white, lustrous black, or gleaming metallic gold, silver, brass, copper, or bronze.</p>
                    <br>
                    <h3>Proud Dragon Kin</h3>
                    <br>
                    <p>To any dragonborn, the clan is more important than life itself. Dragonborn owe their devotion and respect to their clan above all else, even the gods. Each dragonborn’s conduct reflects on the honor of his or her clan, and bringing dishonor to the clan can result in expulsion and exile. Each dragonborn knows his or her station and duties within the clan, and honor demands maintaining the bounds of that position.</p>
                    <p>A continual drive for self-improvement reflects the self-sufficiency of the race as a whole. Dragonborn value skill and excellence in all endeavors. They hate to fail, and they push themselves to extreme efforts before they give up on something. A dragonborn holds mastery of a particular skill as a lifetime goal. Members of other races who share the same commitment find it easy to earn the respect of a dragonborn.</p>
                    <p>Though all dragonborn strive to be self-sufficient, they recognize that help is sometimes needed in difficult situations. But the best source for such help is the clan, and when a clan needs help, it turns to another dragonborn clan before seeking aid from other races—or even from the gods.</p>
                    <br>
                    <h3><b>Dragonborn Names</b></h3>
                    <br>
                    <p>Dragonborn have personal names given at birth, but they put their clan names first as a mark of honor. A childhood name or nickname is often used among clutchmates as a descriptive term or a term of endearment. The name might recall an event or center on a habit.</p>
                    <p><b>Male Names:</b> Arjhan, Balasar, Bharash, Donaar, Ghesh, Heskan, Kriv, Medrash, Mehen, Nadarr, Pandjed, Patrin, Rhogar, Shamash, Shedinn, Tarhun, Torinn</p>
                    <p><b>Female Names:</b> Akra, Biri, Daar, Farideh, Harann, Havilar, Jheri, Kava, Korinn, Mishann, Nala, Perra, Raiann, Sora, Surina, Thava, Uadjit</p>
                    <p>Childhood Names: Climber, Earbender, Leaper, Pious, Shieldbiter, Zealous</p>
                    <p><b>Clan Names:</b> Clethtinthiallor, Daardendrian, Delmirev, Drachedandion, Fenkenkabradon, Kepeshkmolik, Kerrhylon, Kimbatuul, Linxakasendalor, Myastan, Nemmonis, Norixius, Ophinshtalajiir, Prexijandilin, Shestendeliath, Turnuroth, Verthisathurgiesh, Yarjerit</p>
                    ',
                'walking_speed' => '30',
                'asi' => 'Your Strength score increases by 2, and your Charisma score increases by 1.',
                'size' => Race::SIZE_MEDIUM,
                'size_description' => 'Dragonborn are taller and heavier than humans, standing well over 6 feet tall and averaging almost 250 pounds. Your size is Medium.',
                'age' => 'Young dragonborn grow quickly. They walk hours after hatching, attain the size and development of a 10-year-old human child by the age of 3, and reach adulthood by 15. They live to be around 80.',
                'str_bonus' => 2,
                'cha_bonus' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        Race::factory()->create(['name' => 'Dwarf']);
        Race::factory()->create(['name' => 'Elf']);
        Race::factory()->create(['name' => 'Gnome']);
        Race::factory()->create(['name' => 'Half-elf']);
        Race::factory()->create(['name' => 'Halfling']);
        Race::factory()->create(['name' => 'Half-orc']);
        Race::factory()->create(['name' => 'Human']);
        Race::factory()->create(['name' => 'Tiefling']);


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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Race;
use Illuminate\Support\Facades\DB;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();

            
            $table->string('name')->unique();
            $table->text('description');
            $table->string('walking_speed')->default('30');
            $table->string('asi');
            $table->string('size');
            $table->text('size_description');
            $table->string('age');


            $table->tinyInteger('str_bonus')->default(0);
            $table->tinyInteger('dex_bonus')->default(0);
            $table->tinyInteger('con_bonus')->default(0);
            $table->tinyInteger('int_bonus')->default(0);
            $table->tinyInteger('wis_bonus')->default(0);
            $table->tinyInteger('cha_bonus')->default(0);

            $table->timestamps();
        });

        DB::table('races')->insert($this->getData());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }

    protected function getData()
    {
        return [
            [
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
            ],
            // [
            //     'name' => 'Dwarf',
            //     'description' => '',

            //     'walking_speed' => '25',
            //     'asi' => 'Your Strength score increases by 2, and your Charisma score increases by 1.',
            //     'size' => Race::SIZE_MEDIUM,
            //     'size_description' => 'Dragonborn are taller and heavier than humans, standing well over 6 feet tall and averaging almost 250 pounds. Your size is Medium.',
            //     'age' => 'Young dragonborn grow quickly. They walk hours after hatching, attain the size and development of a 10-year-old human child by the age of 3, and reach adulthood by 15. They live to be around 80.',
            //     'con_bonus' => 2,
            //     'created_at' => now(),
            //     'updated_at' => now()
            //     // 'description' => "
            //     // Kingdoms rich in ancient grandeur, halls carved into the roots of mountains, the echoing of picks and hammers in deep mines and blazing forges, a commitment to clan and tradition, and a burning hatred of goblins and orcs—these common threads unite all dwarves.
            //     // Short and Stout
                
            //     // Bold and hardy, dwarves are known as skilled warriors, miners, and workers of stone and metal. Though they stand well under 5 feet tall, dwarves are so broad and compact that they can weigh as much as a human standing nearly two feet taller. Their courage and endurance are also easily a match for any of the larger folk.
                
            //     // Dwarven skin ranges from deep brown to a paler hue tinged with red, but the most common shades are light brown or deep tan, like certain tones of earth. Their hair, worn long but in simple styles, is usually black, gray, or brown, though paler dwarves often have red hair. Male dwarves value their beards highly and groom them carefully.
            //     // Long Memory, Long Grudges
                
            //     // Dwarves can live to be more than 400 years old, so the oldest living dwarves often remember a very different world. For example, some of the oldest dwarves living in Citadel Felbarr (in the world of the Forgotten Realms) can recall the day, more than three centuries ago, when orcs conquered the fortress and drove them into an exile that lasted over 250 years. This longevity grants them a perspective on the world that shorter-lived races such as humans and halflings lack.
                
            //     // Dwarves are solid and enduring like the mountains they love, weathering the passage of centuries with stoic endurance and little change. They respect the traditions of their clans, tracing their ancestry back to the founding of their most ancient strongholds in the youth of the world, and don’t abandon those traditions lightly. Part of those traditions is devotion to the gods of the dwarves, who uphold the dwarven ideals of industrious labor, skill in battle, and devotion to the forge.
                
            //     // Individual dwarves are determined and loyal, true to their word and decisive in action, sometimes to the point of stubbornness. Many dwarves have a strong sense of justice, and they are slow to forget wrongs they have suffered. A wrong done to one dwarf is a wrong done to the dwarf’s entire clan, so what begins as one dwarf’s hunt for vengeance can become a full-blown clan feud.
            //     // Clans and Kingdoms
                
            //     // Dwarven kingdoms stretch deep beneath the mountains where the dwarves mine gems and precious metals and forge items of wonder. They love the beauty and artistry of precious metals and fine jewelry, and in some dwarves this love festers into avarice. Whatever wealth they can’t find in their mountains, they gain through trade. They dislike boats, so enterprising humans and halflings frequently handle trade in dwarven goods along water routes. Trustworthy members of other races are welcome in dwarf settlements, though some areas are off limits even to them.
                
            //     // The chief unit of dwarven society is the clan, and dwarves highly value social standing. Even dwarves who live far from their own kingdoms cherish their clan identities and affiliations, recognize related dwarves, and invoke their ancestors’ names in oaths and curses. To be clanless is the worst fate that can befall a dwarf.
                
            //     // Dwarves in other lands are typically artisans, especially weaponsmiths, armorers, and jewelers. Some become mercenaries or bodyguards, highly sought after for their courage and loyalty.
            //     // Gods, Gold, and Clan
                
            //     // Dwarves who take up the adventuring life might be motivated by a desire for treasure—for its own sake, for a specific purpose, or even out of an altruistic desire to help others. Other dwarves are driven by the command or inspiration of a deity, a direct calling or simply a desire to bring glory to one of the dwarf gods. Clan and ancestry are also important motivators. A dwarf might seek to restore a clan’s lost honor, avenge an ancient wrong the clan suffered, or earn a new place within the clan after having been exiled. Or a dwarf might search for the axe wielded by a mighty ancestor, lost on the field of battle centuries ago.
                
            //     //     SLOW TO TRUST
                
            //     //     Dwarves get along passably well with most other races. “The difference between an acquaintance and a friend is about a hundred years,” is a dwarf saying that might be hyperbole, but certainly points to how difficult it can be for a member of a short-lived race like humans to earn a dwarf’s trust.
                
            //     //     Elves. “It’s not wise to depend on the elves. No telling what an elf will do next; when the hammer meets the orc’s head, they’re as apt to start singing as to pull out a sword. They’re flighty and frivolous. Two things to be said for them, though: They don’t have many smiths, but the ones they have do very fine work. And when orcs or goblins come streaming down out of the mountains, an elf’s good to have at your back. Not as good as a dwarf, maybe, but no doubt they hate the orcs as much as we do.”
                
            //     //     Halflings. “Sure, they’re pleasant folk. But show me a halfling hero. An empire, a triumphant army. Even a treasure for the ages made by halfling hands. Nothing. How can you take them seriously?”
                
            //     //     Humans. “You take the time to get to know a human, and by then the human’s on her deathbed. If you’re lucky, she’s got kin—a daughter or granddaughter, maybe—who’s got hands and heart as good as hers. That’s when you can make a human friend. And watch them go! They set their hearts on something, they’ll get it, whether it’s a dragon’s hoard or an empire’s throne. You have to admire that kind of dedication, even if it gets them in trouble more often than not.”
                
            //     // Dwarf Names
                
            //     // A dwarf’s name is granted by a clan elder, in accordance with tradition. Every proper dwarven name has been used and reused down through the generations. A dwarf’s name belongs to the clan, not to the individual. A dwarf who misuses or brings shame to a clan name is stripped of the name and forbidden by law to use any dwarven name in its place.
                
            //     // Male Names: Adrik, Alberich, Baern, Barendd, Brottor, Bruenor, Dain, Darrak, Delg, Eberk, Einkil, Fargrim, Flint, Gardain, Harbek, Kildrak, Morgran, Orsik, Oskar, Rangrim, Rurik, Taklinn, Thoradin, Thorin, Tordek, Traubon, Travok, Ulfgar, Veit, Vondal
                
            //     // Female Names: Amber, Artin, Audhild, Bardryn, Dagnal, Diesa, Eldeth, Falkrunn, Finellen, Gunnloda, Gurdis, Helja, Hlin, Kathra, Kristryd, Ilde, Liftrasa, Mardred, Riswynn, Sannl, Torbera, Torgga, Vistra
                
            //     // Clan Names: Balderk, Battlehammer, Brawnanvil, Dankil, Fireforge, Frostbeard, Gorunn, Holderhek, Ironfist, Loderr, Lutgehr, Rumnaheim, Strakeln, Torunn, Ungart
            //     // Subrace
                
            //     // Two main subraces of dwarves populate the worlds of D&D: hill dwarves and mountain dwarves. Choose one of these subraces or one from another source.
                
            //     //     DUERGAR
                
            //     //     In cities deep in the Underdark live the duergar, or gray dwarves. These vicious, stealthy slave traders raid the surface world for captives, then sell their prey to the other races of the Underdark. They have innate magical abilities to become invisible and to temporarily grow to giant size.
                
            //     // Dwarf Traits
            //     // Your dwarf character has an assortment of inborn abilities, part and parcel of dwarven nature.
            //     // Ability Score Increase
                
            //     // Your Constitution score increases by 2.
            //     // Age
                
            //     // Dwarves mature at the same rate as humans, but they’re considered young until they reach the age of 50. On average, they live about 350 years.
            //     // Size
                
            //     // Dwarves stand between 4 and 5 feet tall and average about 150 pounds. Your size is Medium.
            //     // Speed
                
            //     // Your base walking speed is 25 feet. Your speed is not reduced by wearing heavy armor.
            //     // Darkvision
                
            //     // Accustomed to life underground, you have superior vision in dark and dim conditions. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You can’t discern color in darkness, only shades of gray.
            //     // Dwarven Resilience
                
            //     // You have advantage on saving throws against poison, and you have resistance against poison damage (explained in the “Combat” section).
            //     // Dwarven Combat Training
                
            //     // You have proficiency with the battleaxe, handaxe, light hammer, and warhammer.
            //     // Tool Proficiency
                
            //     // You gain proficiency with the artisan’s tools of your choice: smith’s tools, brewer’s supplies, or mason’s tools.
            //     // Stonecunning
                
            //     // Whenever you make an Intelligence (History) check related to the origin of stonework, you are considered proficient in the History skill and add double your proficiency bonus to the check, instead of your normal proficiency bonus.
            //     // Languages
                
            //     // You can speak, read, and write Common and Dwarvish. Dwarvish is full of hard consonants and guttural sounds, and those characteristics spill over into whatever other language a dwarf might speak.
            //     // Gray Dwarf (Duergar)
                
            //     // The gray dwarves, or duergar, live deep in the Underdark. After delving deeper than any other dwarves, they were enslaved by mind flayers for eons. Although they eventually won their freedom, these grim, ashen-skinned dwarves now take slaves of their own and are as tyrannical as their former masters.
                
            //     // Physically similar to other dwarves in some ways, duergar are wiry and lean, with black eyes and bald heads, with the males growing long, unkempt, gray beards.
                
            //     // Duergar value toil above all else. Showing emotions other than grim determination or wrath is frowned on in their culture, but they can sometimes seem joyful when at work. They have the typical dwarven appreciation for order, tradition, and impeccable craftsmanship, but their goods are purely utilitarian, disdaining aesthetic or artistic value.
                
            //     // Few duergar become adventurers, fewer still on the surface world, because they are a hidebound and suspicious race. Those who leave their subterranean cities are usually exiles. Check with your Dungeon Master to see if you can play a gray dwarf character.
                
            //     // Duergar see themselves as the true manifestation of dwarven ideals, clever enough not to be taken in by the treacherous deceptions of Moradin and his false promises. Their period of enslavement and the revolt against the mind flayers led by their god, Laduguer, purged the influence of the other dwarven gods from their souls and thus made them into the superior race.
                
            //     // Duergar have no appreciation for beauty, that ability having been erased from their minds by the mind flayers long ago and any thought of recapturing it obliterated by Moradin’s betrayal. The duergar lead bleak, grim lives devoid of happiness or satisfaction, but they see that as their defining strength — the root of duergar pride, as it were — rather than a drawback to be corrected.
            //     // Ability Score Increase
                
            //     // Your Strength score increases by 1.
            //     // Superior Darkvision
                
            //     // Your darkvision has a radius of 120 feet.
            //     // Extra Language
                
            //     // You can speak, read, and write Undercommon.
            //     // Duergar Resilience
                
            //     // You have advantage on saving throws against illusions and against being charmed or paralyzed.
            //     // Duergar Magic
                
            //     // When you reach 3rd level, you can cast the enlarge/reduce spell on yourself once with this trait, using only the spell’s enlarge option. When you reach 5th level, you can cast the invisibility spell on yourself once with this trait. You don’t need material components for either spell, and you can’t cast them while you’re in direct sunlight, although sunlight has no effect on them once cast. You regain the ability to cast these spells with this trait when you finish a long rest. Intelligence is your spellcasting ability for these spells.
            //     // Sunlight Sensitivity
                
            //     // You have disadvantage on attack rolls and on Wisdom (Perception) checks that rely on sight when you, the target of your attack, or whatever you are trying to perceive is in direct sunlight.
            //     // Hill Dwarf
                
            //     // As a hill dwarf, you have keen senses, deep intuition, and remarkable resilience. The gold dwarves of Faerûn in their mighty southern kingdom are hill dwarves, as are the exiled Neidar and the debased Klar of Krynn in the Dragonlance setting.
            //     // Ability Score Increase
                
            //     // Your Wisdom score increases by 1.
            //     // Dwarven Toughness
                
            //     // Your hit point maximum increases by 1, and it increases by 1 every time you gain a level.
            //     // Mark of Warding Dwarf
                
            //     //     My family has the finest vaults you can imagine. They forge the locks that secure royal jewels. And I learned to pick those locks when I was barely out of the crib.
                
            //     //     —Cutter, burglar and Kundarak excoriate
                
            //     // The Mark of Warding helps its bearers protect things of value. Using the mark, a dwarf can weave wards with mystic force. It also provides its bearer with an intuitive understanding of locks used to protect and seal.
            //     // House Kundarak
                
            //     // Leader: Morrikan d’Kundarak
                
            //     // Headquarters: Korunda Gate (Mror Holds)
                
            //     // If you want to keep something safe—jewels, secrets, prisoners—Kundarak is there to help. The Defenders Guild of House Kundarak trains locksmiths, security specialists, and more. It maintains the prison of Dreadhold, along with a number of smaller prisons. As useful as these services are, it’s the Banking Guild that truly defines the house. Kundarak’s lands in the Mror Holds include deep veins of precious metals, which the dwarves used to establish the banking industry of Khorvaire. Anyone who makes a living from coin—from bankers to goldsmiths—likely learned their skills at House Kundarak. The security of banks bearing the Kundarak manticore emblem is legendary. The house also provides a special service to those who can afford it: a system of extradimensional vaults, allowing a client to store their goods in one location and retrieve them at any other Kundarak enclave.
                
            //     // House Kundarak has a close alliance with House Sivis. Like the House of Scribing, Kundarak has worked to earn the trust of its clients and to establish a reputation for unshakable integrity. The house has no love of renegade dwarves using their marks to turn a profit, and such rogues strive to avoid the eye of Kundarak.
                
            //     // As the dwarves of the Mror Holds have come into increasing conflict with the daelkyr, Lord Morrikan d’Kundarak has instructed house heirs to establish connections with the Gatekeeper druids. The druids have much in common with the house, being the creators of the wards that protect Eberron from the daelkyr.
            //     // Ability Score Increase
                
            //     // Your Intelligence score increases by 1.
            //     // Warder’s Intuition
                
            //     // When you make an Intelligence (Investigation) check or an ability check using thieves' tools, you can roll a d4 and add the number rolled to the ability check.
            //     // Wards and Seals
                
            //     // You can cast the alarm and mage armor spells with this trait. Starting at 3rd level, you can also cast the arcane lock spell with it. Once you cast any of these spells with this trait, you can’t cast that spell with it again until you finish a long rest. Intelligence is your spellcasting ability for these spells, and you don’t need material components for them when you cast them with this trait.
            //     // Spells of the Mark
                
            //     // If you have the Spellcasting or the Pact Magic class feature, the spells on the Mark of Warding Spells table are added to the spell list of your spellcasting class.
            //     // Spell Level 	Spells
            //     // 1st 	alarm, armor of Agathys
            //     // 2nd 	arcane lock, knock
            //     // 3rd 	glyph of warding, magic circle
            //     // 4th 	Leomund’s secret chest, Mordenkainen’s faithful hound
            //     // 5th 	antilife shell
            //     // Mountain Dwarf
                
            //     // As a mountain dwarf, you’re strong and hardy, accustomed to a difficult life in rugged terrain. You’re probably on the tall side (for a dwarf), and tend toward lighter coloration. The shield dwarves of northern Faerûn, as well as the ruling Hylar clan and the noble Daewar clan of Dragonlance, are mountain dwarves.
            //     // Ability Score Increase
                
            //     // Your Strength score increases by 2.
            //     // Dwarven Armor Training
                
            //     // You have proficiency with light and medium armor.
                
            //     // "

            // ],


            // [
            //     'name' => 'Elf',
            // ],
            // [
            //     'name' => 'Gnome',
            // ],
            // [
            //     'name' => 'Half-elf',
            // ],
            // [
            //     'name' => 'Halfling',
            // ],
            // [
            //     'name' => 'Half-orc',
            // ],
            // [
            //     'name' => 'Human',
            // ],
            // [
            //     'name' => 'Tiefling',
            // ]
            
        ];
    }
}

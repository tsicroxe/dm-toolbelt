<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    public const ALLOWED_CAST_TIMES = ["1 Action", "1 Reaction", "1 Bonus Action"];
    public const ALLOWED_DURATIONS = ["1 Round", "1 Minute", "1 Hour", "1 Day", "1 Week"];
    public const ALLOWED_SCHOOLS = ['Conjuration', 'Necromancy', 'Evocation', 'Abjuration', 'Transmutation', 'Divination', 'Enchantment', 'Illusion'];
    public const ALLOWED_RANGE_AREA = ['5ft', '10ft', '15ft', '15ft', '30ft', '60ft', '120ft', '1 mile'];
    public const ALLOWED_COMPONENTS = ['V', 'M', 'S'];
    public const ALLOWED_ATTACK_SAVE = ['Melee', 'Ranged', 'Str save', 'Int save', 'Cha save', 'Wis save', 'Dex save', 'Con save', null];
    public const ALLOWED_DAMAGE_TYPES = ['Fire', 'Cold', 'Healing', 'Radiant', 'Lightning', 'Poison', 'Thunder', 'Bludgeoning', 'Piercing', 'Slashing', 'Necrotic', 'Acid', 'Force', 'Psychic', null];

    protected $guarded = ['id'];


    /*
     * The characters that have a particular spell
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}

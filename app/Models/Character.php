<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    public const ALLOWED_SKILL_VALUES = ['untrained', 'trained', 'expertise'];
    public const BASE_AC = 10;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the character.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the race of the character.
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
    

    /*
     * The classes/guilds that belong to this character
     */
    public function guilds()
    {
        return $this->belongsToMany(Guild::class)->withPivot('level');
    }

}

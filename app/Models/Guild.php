<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    /*
     * The characters that have this class
     */
    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}

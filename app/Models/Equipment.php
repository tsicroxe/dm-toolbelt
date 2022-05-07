<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    /*
     * All characters that have this equipment
     */
    public function equipment()
    {
        return $this->belongsToMany(Character::class);
    }
}

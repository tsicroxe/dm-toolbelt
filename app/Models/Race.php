<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    public const SIZE_SMALL = 'Small';
    public const SIZE_MEDIUM = 'Medium';
    public const SIZE_LARGE = 'Large';

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Character extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the character.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Get the user's first name.
    *
    * @param  string  $value
    * @return string
    */
   public function getCount()
   {
       return $this->model->count(Character::where('user_id', Auth::id()));
   }
    
}

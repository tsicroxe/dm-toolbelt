<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Race;

class CharacterViewer extends Component
{

    public Character $character;
    public Race $race;

    protected $rules = [

        'character.name' => 'required|string|min:5|max:191',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->character->save();
    }

    public function mount(Character $character)
    {
        abort_if(Auth::id() !== $character->user_id, 404);

        $this->character = $character;
        $this->race = $character->race;
    }

    public function render()
    {
        return view('livewire.character-viewer');
    }
}

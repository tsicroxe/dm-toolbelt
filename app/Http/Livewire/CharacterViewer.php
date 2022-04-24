<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CharacterViewer extends Component
{

    public Character $character;

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
    }

    public function render()
    {
        return view('livewire.character-viewer');
    }
}

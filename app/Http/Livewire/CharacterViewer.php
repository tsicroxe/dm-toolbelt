<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CharacterViewer extends Component
{

    public Character $character;

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

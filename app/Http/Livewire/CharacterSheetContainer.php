<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CharacterSheetContainer extends Component
{
    public array $characters = ["1", "2", "3"];

    

    public function render()
    {
        return view('livewire.character-sheet-container');
    }
}

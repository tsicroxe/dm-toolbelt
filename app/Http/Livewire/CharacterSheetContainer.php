<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CharacterSheetContainer extends Component
{
    public array $characters = ["1", "2", "3"];


    protected $rules = [
        'characterName' => 'required|min:2',
    ];

    public function mount()
    {
        if(!Auth::check()){
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.character-sheet-container');
    }

    // Create a character
    // View a list of player characters
}

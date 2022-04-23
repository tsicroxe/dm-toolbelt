<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CharacterSheetContainer extends Component
{
    use WithPagination;


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
        return view('livewire.character-sheet-container', ['characters' => Character::paginate(10)]);
    }

    // Create a character
    // View a list of player characters
}

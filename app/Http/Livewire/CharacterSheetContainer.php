<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CharacterSheetContainer extends Component
{
    use WithPagination;

    protected int $pagination = 10;
    protected $listeners = ['reRenderParent'];


    public function mount()
    {

    }


    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function delete(Character $character)
    {
        $character->delete();
    }

    public function render()
    {
        return view('livewire.character-sheet-container', ['characters' => Character::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate($this->pagination)]);
    }

    // Create a character
    // View a list of player characters
}

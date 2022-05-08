<?php

namespace App\Http\Livewire;

use App\Models\Character;
use App\Models\Spell;
use Livewire\Component;

class SpellsContainer extends Component
{

    public $spells;
    public $character;
    public $cantrips;

    public function mount(Character $character)
    {
        $this->character = $character;
        $this->cantrips = $character->spells->where('level', 0);
        $cantrip = Spell::where('level', 0)->inRandomOrder()->first();
        $this->character->spells()->attach($cantrip->id);
    }

    public function removeSpell($id)
    {
        $this->emit('deleteSpell', $id);
    }

    public function render()
    {
        return view('livewire.spells-container');
    }
}

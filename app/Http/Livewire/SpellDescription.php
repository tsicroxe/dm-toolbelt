<?php

namespace App\Http\Livewire;

use App\Models\Spell;
use Livewire\Component;

class SpellDescription extends Component
{

    public $spell;

    public function mount(Spell $spell)
    {
        $this->spell = $spell;
    }

    public function render()
    {
        return view('livewire.spell-description');
    }
}

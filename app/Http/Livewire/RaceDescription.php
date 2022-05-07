<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Race;

class RaceDescription extends Component
{
    public $race;

    public function mount(Race $race)
    {
        $this->race = $race;
    }
    public function render()
    {
        return view('livewire.race-description');
    }
}

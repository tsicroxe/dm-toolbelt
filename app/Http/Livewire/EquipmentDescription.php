<?php

namespace App\Http\Livewire;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentDescription extends Component
{
    public $equipment;

    public function mount(Equipment $equipment)
    {
        $this->equipment = $equipment;
    }

    public function render()
    {
        return view('livewire.equipment-description');
    }
}

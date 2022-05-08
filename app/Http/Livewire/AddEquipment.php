<?php

namespace App\Http\Livewire;

use App\Models\Character;
use App\Models\Equipment;
use Livewire\Component;

class AddEquipment extends Component
{
    public $equipment;
    public $character;
    public $itemForm = [
        'id' => '',
        'quantity' => 1
    ];

    protected $rules = [
        'itemForm.id' => 'required|exists:equipment,id',
        'itemForm.quantity' => 'required|exists:equipment,id',

    ];

    public function mount(Character $character){
        $this->character = $character->load('equipment');
        $this->equipment = Equipment::all()->sortBy('name');
    }

    public function addItemAndQuantity()
    {
        if (!$this->itemForm['id'] && !$this->itemForm['quantity']) {
            return;
        }
        if ($this->character->equipment->contains($this->itemForm['id'])) {
            $this->character->equipment()->detach($this->itemForm['id']);
            $this->character->equipment()->attach($this->itemForm['id'], ['quantity' => $this->itemForm['quantity']]);
        } else {
            $this->character->equipment()->attach($this->itemForm['id'], ['quantity' => $this->itemForm['quantity']]);

        }

        $this->emit('reRenderParent');
    }

    public function deleteItem($itemId)
    {
        $this->character->equipment()->detach($itemId);
        $this->emit('reRenderParent');
    }


    public function render()
    {
        return view('livewire.add-equipment');
    }
}

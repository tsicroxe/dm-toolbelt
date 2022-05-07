<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Equipment;

class SearchEquipment extends Component
{
    use WithPagination;

    public $searchTerm;
    
    public function render()
    {
        $equipment = Equipment::orderBy('name')->paginate(10);
        if($this->searchTerm){
            $searchTerm = '%' . $this->searchTerm . '%';
            $equipment = Equipment::where('name', 'like', $searchTerm)->orderBy('name')->paginate(10);
        }
    
        return view('livewire.search-equipment', ['equipment' => $equipment]);
    }
}


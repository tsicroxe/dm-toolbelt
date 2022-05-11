<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Race;
use Livewire\WithPagination;

class SearchRaces extends Component
{
    use WithPagination;

    public function render()
    {
        $races = Race::orderBy('name')->get();

        return view('livewire.search-races', ['races' => $races]);
    }
}

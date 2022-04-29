<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Race;
use Livewire\WithPagination;

class SearchRaces extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $races = Race::paginate(10);
        if($this->searchTerm){
            $searchTerm = '%' . $this->searchTerm . '%';
            $races = Race::where('name', 'like', $searchTerm)->paginate(10);
        }

        return view('livewire.search-races', ['races' => $races]);
    }
}

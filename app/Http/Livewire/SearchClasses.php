<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guild;
use Livewire\WithPagination;

class SearchClasses extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $classes = Guild::orderBy('name')->get();

        return view('livewire.search-classes', ['classes' => $classes]);
    }
}

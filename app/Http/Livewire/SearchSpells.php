<?php

namespace App\Http\Livewire;

use App\Models\Spell;
use Livewire\Component;
use Livewire\WithPagination;

class SearchSpells extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $spells = Spell::orderBy('level')->orderBy('school')->orderBy('name')->paginate(10);
        if ($this->searchTerm) {
            $searchTerm = '%' . $this->searchTerm . '%';
            $spells = Spell::where('name', 'like', $searchTerm)
                ->orWhere('level', 'like', $searchTerm)
                ->orWhere('school', 'like', $searchTerm)
                ->orWhere('damage_type', 'like', $searchTerm)
                ->orWhere('cast_time', 'like', $searchTerm)
                ->orderBy('level')->orderBy('school')->orderBy('name')
                ->paginate(10);
        }

        return view('livewire.search-spells', ['spells' => $spells]);
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Race;

class CharacterViewer extends Component
{

    public Character $character;
    public $races;
    public $race;
    public $str_mod = 0;
    public $dex_mod = 0;
    public $con_mod = 0;
    public $int_mod = 0;
    public $wis_mod = 0;
    public $cha_mod = 0;

    protected $listeners = ['reRenderParent'];

    protected $rules = [

        'character.name' => 'required|string|min:5|max:191',
        'character.race_id' => 'integer',
        'character.str_score' => 'integer|between:0,100',
        'character.dex_score' => 'integer|between:0,100',
        'character.con_score' => 'integer|between:0,100',
        'character.int_score' => 'integer|between:0,100',
        'character.wis_score' => 'integer|between:0,100',
        'character.cha_score' => 'integer|between:0,100',

    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
        $this->character->save();
        $this->emit('reRenderParent'); 
    }

    public function reRenderParent(): void
    {

        $this->mount($this->character);
        $this->render();
    }

    public function calculateModifier($score): int
    {
        return floor(($score - 10) / 2);
    }

    public function mount(Character $character): void
    {
        abort_if(Auth::id() !== $character->user_id, 404);

        $this->character = $character;
        $this->race = $character->race;
        $this->races = Race::all();

        $this->str_mod = $this->calculateModifier($character->str_score);
        $this->dex_mod = $this->calculateModifier($character->dex_score);
        $this->con_mod = $this->calculateModifier($character->con_score);
        $this->int_mod = $this->calculateModifier($character->int_score);
        $this->wis_mod = $this->calculateModifier($character->wis_score);
        $this->cha_mod = $this->calculateModifier($character->cha_score);

    }

    public function render()
    {
        return view('livewire.character-viewer');
    }
}

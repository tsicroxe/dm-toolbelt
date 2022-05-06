<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Race;

class CharacterViewer extends Component
{

    public Character $character;
    public $prof_bonus = 0;
    public $skill_options;
    public $races;
    public $race;
    public $str_mod = 0;
    public $dex_mod = 0;
    public $con_mod = 0;
    public $int_mod = 0;
    public $wis_mod = 0;
    public $cha_mod = 0;

    public $total_acrobatics = 0;

    protected $listeners = ['reRenderParent'];

    protected $rules = [

        'character.name' => 'required|string|min:5|max:191',
        'character.race_id' => 'required|integer',
        'character.str_score' => 'integer|between:0,100',
        'character.dex_score' => 'integer|between:0,100',
        'character.con_score' => 'integer|between:0,100',
        'character.int_score' => 'integer|between:0,100',
        'character.wis_score' => 'integer|between:0,100',
        'character.cha_score' => 'integer|between:0,100',
        'character.acrobatics' => 'string',


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

    public function calculatProfBonus($level)
    {
        if($level < 5){
            return 2;
        }
        elseif($level < 9){
            return 3;
        }
        elseif($level < 13){
            return 4;
        }
        elseif($level < 17){
            return 5;
        }
        elseif($level <= 20){
            return 5;
        }
            return 2;
    }

    public function calculateSkill($mod_bonus, $trained_status): int
    {
        switch ($trained_status) {
            case 'trained':
                return $mod_bonus + $this->prof_bonus;
            case 'expertise':
                return $mod_bonus + ($this->prof_bonus * 2);
            default:
                return $mod_bonus;
            }
    }

    public function mount(Character $character): void
    {
        abort_if(Auth::id() !== $character->user_id, 404);

        $this->character = $character;
        $this->race = $character->race;
        $this->races = Race::all();
        $this->skill_options = Character::ALLOWED_SKILL_VALUES;
        
        $this->prof_bonus = $this->calculatProfBonus($character->level);

        $this->str_mod = $this->calculateModifier($character->str_score);
        $this->dex_mod = $this->calculateModifier($character->dex_score);
        $this->con_mod = $this->calculateModifier($character->con_score);
        $this->int_mod = $this->calculateModifier($character->int_score);
        $this->wis_mod = $this->calculateModifier($character->wis_score);
        $this->cha_mod = $this->calculateModifier($character->cha_score);

        $this->total_acrobatics = $this->calculateSkill($this->dex_mod, $character->acrobatics);
    }

    public function render()
    {
        return view('livewire.character-viewer');
    }
}

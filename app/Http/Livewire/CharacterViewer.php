<?php

namespace App\Http\Livewire;

use App\Models\Character;
use App\Models\Guild;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Race;

class CharacterViewer extends Component
{

    public Character $character;
    public $guilds;
    public $character_guilds;
    public $skill_options;
    public $races;
    public $guildForm;

    // Calculated attributes
    public $prof_bonus = 0;
    public $armor_class = 0;
    public $initiative = 0;

    // Ability modifiers
    public $str_mod = 0;
    public $dex_mod = 0;
    public $con_mod = 0;
    public $int_mod = 0;
    public $wis_mod = 0;
    public $cha_mod = 0;

    // Skills
    public $total_acrobatics = 0;
    public $total_animal_handling = 0;
    public $total_athletics = 0;
    public $total_arcana = 0;
    public $total_deception = 0;
    public $total_history = 0;
    public $total_insight = 0;
    public $total_intimidation = 0;
    public $total_investigation = 0;
    public $total_medicine = 0;
    public $total_nature = 0;
    public $total_perception = 0;
    public $total_performance = 0;
    public $total_persuasion = 0;
    public $total_religion = 0;
    public $total_sleight_of_hand = 0;
    public $total_stealth = 0;
    public $total_survival = 0;

    public function mount(Character $character): void
    {
        abort_if(Auth::id() !== $character->user_id, 404);
        // Demographics
        $this->character = $character->load(['guilds', 'race']);
        $this->guilds = Guild::all();
        $this->races = Race::all();
        $this->skill_options = Character::ALLOWED_SKILL_VALUES;

        $this->level = $this->calculateTotalLevel($this->character->guilds);


        $this->prof_bonus = $this->calculatProfBonus($this->level);

        // Ability modifiers
        $this->str_mod = $this->calculateModifier($character->str_score);
        $this->dex_mod = $this->calculateModifier($character->dex_score);
        $this->con_mod = $this->calculateModifier($character->con_score);
        $this->int_mod = $this->calculateModifier($character->int_score);
        $this->wis_mod = $this->calculateModifier($character->wis_score);
        $this->cha_mod = $this->calculateModifier($character->cha_score);

        $this->armor_class = $this->calculateArmorClass();
        $this->initiative = $this->dex_mod;


        // Skills
        $this->total_acrobatics = $this->calculateSkill($this->dex_mod, $character->acrobatics);
        $this->total_animal_handling = $this->calculateSkill($this->wis_mod, $character->animal_handling);
        $this->total_arcana = $this->calculateSkill($this->int_mod, $character->arcana);
        $this->total_athletics = $this->calculateSkill($this->str_mod, $character->athletics);
        $this->total_deception = $this->calculateSkill($this->cha_mod, $character->deception);
        $this->total_history = $this->calculateSkill($this->int_mod, $character->history);
        $this->total_insight = $this->calculateSkill($this->wis_mod, $character->insight);
        $this->total_intimidation = $this->calculateSkill($this->cha_mod, $character->intimidation);
        $this->total_investigation = $this->calculateSkill($this->int_mod, $character->investigation);
        $this->total_medicine = $this->calculateSkill($this->wis_mod, $character->medicine);
        $this->total_nature = $this->calculateSkill($this->int_mod, $character->nature);
        $this->total_perception = $this->calculateSkill($this->wis_mod, $character->perception);
        $this->total_performance = $this->calculateSkill($this->cha_mod, $character->performance);
        $this->total_persuasion = $this->calculateSkill($this->cha_mod, $character->persuasion);
        $this->total_religion = $this->calculateSkill($this->int_mod, $character->religion);
        $this->total_sleight_of_hand = $this->calculateSkill($this->dex_mod, $character->sleight_of_hand);
        $this->total_stealth = $this->calculateSkill($this->dex_mod, $character->stealth);
        $this->total_survival = $this->calculateSkill($this->wis_mod, $character->survival);
    }


    protected $listeners = ['reRenderParent'];

    protected $rules = [

        'character.name' => 'required|string|min:5|max:191',
        'character.race_id' => 'required|integer',
        'character.level' => 'required|integer|between:1,20',

        'character.str_score' => 'required|integer|between:0,100',
        'character.dex_score' => 'required|integer|between:0,100',
        'character.con_score' => 'required|integer|between:0,100',
        'character.int_score' => 'required|integer|between:0,100',
        'character.wis_score' => 'required|integer|between:0,100',
        'character.cha_score' => 'required|integer|between:0,100',

        'character.acrobatics' => 'required|string',
        'character.animal_handling' => 'required|string',
        'character.athletics' => 'required|string',
        'character.arcana' => 'required|string',
        'character.deception' => 'required|string',
        'character.history' => 'required|string',
        'character.insight' => 'required|string',
        'character.intimidation' => 'required|string',
        'character.investigation' => 'required|string',
        'character.medicine' => 'required|string',
        'character.nature' => 'required|string',
        'character.perception' => 'required|string',
        'character.performance' => 'required|string',

        'character.persuasion' => 'required|string',
        'character.religion' => 'required|string',
        'character.sleight_of_hand' => 'required|string',
        'character.stealth' => 'required|string',
        'character.survival' => 'required|string',

        'character.current_hp' => 'required|integer|lte:character.max_hp',
        'character.max_hp' => 'required|integer',

        'guildForm.guild' => 'required|integer|exists:guilds,id',
        'guildForm.level' => 'required|integer|between:1,20'



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

    public function calculateTotalLevel($guilds){
        if($guilds->count() < 1){
            return 1;
        }
        $level = 0;
        foreach($guilds as $guild){
            $level += $guild->pivot?->level;
        }
        return $level;
    }

    public function calculatProfBonus($level)
    {
        if ($level < 5) {
            return 2;
        } elseif ($level < 9) {
            return 3;
        } elseif ($level < 13) {
            return 4;
        } elseif ($level < 17) {
            return 5;
        } elseif ($level <= 20) {
            return 5;
        }
        return 2;
    }

    public function addGuildAndLevel()
    {
        if (!$this->guildForm['guild'] && !$this->guildForm['level']) {

            return;
        }
        $this->character->guilds()->attach($this->guildForm['guild'], ['level' => $this->guildForm['level']]);

        $this->emit('reRenderParent');
    }

    public function deleteGuild($guildId)
    {
        $this->character->guilds()->detach($guildId);
        $this->emit('reRenderParent');
    }

    public function calculateArmorClass()
    {
        return Character::BASE_AC + $this->dex_mod;
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



    public function render()
    {
        return view('livewire.character-viewer');
    }
}

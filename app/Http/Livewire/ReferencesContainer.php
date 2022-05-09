<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReferencesContainer extends Component
{

    public $search = 'classes';


    public function setActive($value)
    {
        switch($value){
            case('classes'):
                $this->search = 'classes';
                break;
            case('races'):
                $this->search = 'races';
                break;
            case('equipment'):
                $this->search = 'equipment';
                break;
            case('spells'):
                $this->search = 'spells';
                break;
            default:
                $this->search = 'classes';
                break;
        }
    }

    public function render()
    {
        return view('livewire.references-container');
    }
}

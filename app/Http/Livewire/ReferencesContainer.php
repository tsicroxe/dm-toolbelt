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
            case('backgrounds'):
                $this->search = 'backgrounds';
                break;
            case('features'):
                $this->search = 'features';
                break;
            case('equipment'):
                $this->search = 'equipment';
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

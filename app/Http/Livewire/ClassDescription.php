<?php

namespace App\Http\Livewire;

use App\Models\Guild;
use Livewire\Component;

class ClassDescription extends Component
{
    public $class;

    public function mount(Guild $guild)
    {
        $this->class = $guild;
    }

    public function render()
    {
        return view('livewire.class-description');
    }
}

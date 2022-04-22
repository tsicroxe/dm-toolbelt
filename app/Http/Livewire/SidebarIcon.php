<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarIcon extends Component
{
    public $icon;
    public $text;

    public function mount(String $icon, String $text)
    {

        $this->icon = $icon;
        $this->text = $text;
    }

    public function render()
    {
        return view('livewire.sidebar-icon');
    }
}

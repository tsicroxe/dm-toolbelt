<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidebarIcon extends Component
{
    public $icon;
    public $text;
    public $url;

    public function mount(string $icon, string $text, string $url)
    {
        $this->icon = $icon;
        $this->text = $text;
        $this->url = $url;
    }

    public function render()
    {
        return view('livewire.sidebar-icon');
    }
}

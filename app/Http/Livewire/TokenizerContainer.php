<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class TokenizerContainer extends Component
{
    use WithFileUploads;

    public $photo;

    public function upload()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $this->photo->store('photos');
    }

    public function render()
    {
        return view('livewire.tokenizer-container');
    }
}

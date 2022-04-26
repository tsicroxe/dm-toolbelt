<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::check()){
           $photo = $this->photo->storeAs('photos', "user-" . Auth::id() . "_" . Str::uuid(16) . ".png");
        }
    }

    public function render()
    {
        return view('livewire.tokenizer-container');
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\Character;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateCharacter extends Component
{

    public string $name = '';

    protected $rules = [
        'name' => 'required|string|min:1|max:191'
    ];


    public function createCharacter()
    {
        $user = Auth::user();
        if(count($user->characters) >= 20)
        {
            session()->flash('max', 'You have reached your character max of 20.');
            return;
        }

        $this->validate();
        Character::create([
            'name' => $this->name,
            'user_id' => Auth::id()
        ]);
        session()->flash('message', 'Character created successfully');
        $this->name = '';
        $this->emit('reRenderParent');
    }

    public function render()
    {
        return view('livewire.create-character');
    }
}

<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CharacterSheetContainer;
use App\Models\Character;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\User;

class CharacterSheetContainerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CharacterSheetContainer::class);

        $component->assertStatus(200);
    }

        /** @test  */
        function can_delete_character()
        {
            $user = User::factory()->create();
            $this->actingAs($user);
            $character = Character::factory()->create(['user_id' => $user->id]);
            Livewire::test(CharacterSheetContainer::class)
                ->call('delete', ['character' => $character->id]);
    
            $this->assertDatabaseCount(Character::class, 0);
        }
}

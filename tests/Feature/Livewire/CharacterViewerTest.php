<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CharacterViewer;
use App\Models\Character;
use App\Models\Equipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\User;

class CharacterViewerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CharacterViewer::class);

        $component->assertStatus(200);
    }

        /** @test */
        public function can_add_equipment()
        {
            $user = User::factory()->create();
            $this->actingAs($user);
            $character = Character::factory()->create(['user_id' => $user->id]);
            $equipment = Equipment::factory()->create();
            Livewire::test(CharacterViewer::class, ['character' => $character])
                ->set('itemForm.id', $equipment->id)
                ->set('itemForm.quantity', 5)
                ->call('addItemAndQuantity', ['id' => $equipment->id, 'name'])
                ->assertSee($equipment->name)
                ->assertSee(5);
        }
        /** @test  */

}

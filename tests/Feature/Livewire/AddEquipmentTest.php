<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\AddEquipment;
use App\Models\Character;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AddEquipmentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AddEquipment::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function can_add_equipment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id]);
        $equipment = Equipment::factory()->create();

        Livewire::test(AddEquipment::class, ['character' => $character])
            ->set('itemForm.id', $equipment->id)
            ->set('itemForm.quantity', 5)
            ->call('addItemAndQuantity', ['id' => $equipment->id, 'name'])
            ->assertSee($equipment->name)
            ->assertSee(5);
    }

    /** @test */
    public function can_delete_equipment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id]);
        $equipment = Equipment::factory()->create();

        Livewire::test(AddEquipment::class, ['character' => $character])
        ->set('itemForm.id', $equipment->id)
        ->set('itemForm.quantity', 5)
        ->call('addItemAndQuantity', ['id' => $equipment->id, 'name']);

        $this->assertDatabaseHas('character_equipment', ['equipment_id' => $equipment->id, 'character_id' => $character->id]);

        Livewire::test(AddEquipment::class, ['character' => $character])
            ->call('deleteItem', ['id' => $equipment->id, 'name']);

        $this->assertDatabaseMissing('character_equipment', ['equipment_id' => $equipment->id, 'character_id' => $character->id]);
    }

        

}

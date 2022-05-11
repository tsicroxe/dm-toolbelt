<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CharacterViewer;
use App\Models\Character;
use App\Models\CharacterEquipment;
use App\Models\CharacterSpell;
use App\Models\Equipment;
use App\Models\Spell;
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

    /** @test */
    public function can_delete_equipment()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id]);
        $equipment = Equipment::factory()->create();
        CharacterEquipment::factory()->create([
            'character_id' => $character->id,
            'equipment_id' => $equipment->id
        ]);

        $this->assertDatabaseCount('character_equipment', 1);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->set('itemForm.id', $equipment->id)
            ->set('itemForm.quantity', 5)
            ->call('addItemAndQuantity', ['id' => $equipment->id, 'name'])
            ->call('deleteItem', $equipment->id);

        $this->assertDatabaseCount('character_equipment', 0);
    }

    /** @test */
    public function can_add_spells()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id]);
        $spell = Spell::factory()->create();
        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->set('spellForm.id', $spell->id)
            ->call('addSpell')
            ->assertSee($spell->name);
    }

    /** @test */
    public function can_delete_spells()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id]);
        $spell = Spell::factory()->create();
        CharacterSpell::factory()->create([
            'character_id' => $character->id,
            'spell_id' => $spell->id
        ]);

        $this->assertDatabaseCount('character_spell', 1);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->set('spellForm.id', $spell->id)
            ->call('addSpell')
            ->call('deleteSpell', $spell->id);

        $this->assertDatabaseCount('character_spell', 0);
    }

    /** @test */
    public function setting_str_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'str_score' => 20]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('str_mod', 5);
    }

    /** @test */
    public function setting_dex_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'dex_score' => 18]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('dex_mod', 4);
    }

    /** @test */
    public function setting_con_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'con_score' => 15]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('con_mod', 2);
    }


    /** @test */
    public function setting_int_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'int_score' => 16]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('int_mod', 3);
    }


    /** @test */
    public function setting_wis_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'wis_score' => 6]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('wis_mod', -2);
    }


    /** @test */
    public function setting_cha_score_adjusts_modifier()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $character = Character::factory()->create(['user_id' => $user->id, 'cha_score' => 10]);

        Livewire::test(CharacterViewer::class, ['character' => $character])
            ->assertViewHas('cha_mod', 0);
    }
}

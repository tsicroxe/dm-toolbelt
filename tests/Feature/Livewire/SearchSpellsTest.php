<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchSpells;
use App\Models\Spell;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchSpellsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchSpells::class);

        $component->assertStatus(200);
    }


    /** @test */
    public function can_filter_spells()
    {
        $spellToFilter = Spell::factory()->create();
        $spell = Spell::factory()->count(2)->create();

        Livewire::test(SearchSpells::class)
            ->assertSee($spellToFilter->name)
            ->assertSee($spell[0]->name)
            ->assertSee($spell[1]->name);

        Livewire::test(SearchSpells::class)
            ->set(['searchTerm' => $spellToFilter->name])
            ->assertSee($spellToFilter->name)
            ->assertDontSee($spell[0]->name)
            ->assertDontSee($spell[1]->name);
    }
}

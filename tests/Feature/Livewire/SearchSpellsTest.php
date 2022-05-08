<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchSpells;
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
}

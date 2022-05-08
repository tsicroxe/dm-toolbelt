<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SpellDescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SpellDescriptionTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SpellDescription::class);

        $component->assertStatus(200);
    }
}

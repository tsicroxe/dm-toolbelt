<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchRaces;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Race;

class SearchRaceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchRaces::class);
        $component->assertStatus(200);
    }

}

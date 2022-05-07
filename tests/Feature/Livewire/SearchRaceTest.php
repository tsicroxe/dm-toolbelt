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

    /** @test */
    public function can_filter_races()
    {
        $raceToFilter = Race::factory()->create();
        $races = Race::factory()->count(2)->create();
        
        Livewire::test(SearchRaces::class)
            ->set(['searchTerm' => $raceToFilter->name])
            ->assertSee($raceToFilter->name)
            ->assertDontSee($races[0]->name)
            ->assertDontSee($races[1]->name);
    }

}

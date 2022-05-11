<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchEquipment;
use App\Models\Equipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class SearchEquipmentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchEquipment::class);
        $component->assertStatus(200);
    }

    /** @test */
    public function can_filter_equipment()
    {
        $equipmentToFilter = Equipment::factory()->create();
        $equipment = Equipment::factory()->count(2)->create();

        Livewire::test(SearchEquipment::class)
            ->set(['searchTerm' => $equipmentToFilter->name])
            ->assertSee($equipmentToFilter->name)
            ->assertDontSee($equipment[0]->name)
            ->assertDontSee($equipment[1]->name);
    }
}

<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SearchClasses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SearchClassesTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SearchClasses::class);

        $component->assertStatus(200);
    }
}

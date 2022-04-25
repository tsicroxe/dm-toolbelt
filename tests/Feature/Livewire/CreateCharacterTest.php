<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateCharacter;
use App\Models\Character;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

class CreateCharacterTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CreateCharacter::class);

        $component->assertStatus(200);
    }

    /** @test  */
    function can_create_character()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(CreateCharacter::class)
            ->set(['name' => $this->faker->name])
            ->call('createCharacter');

        $this->assertDatabaseCount(Character::class, 1);
    }
}

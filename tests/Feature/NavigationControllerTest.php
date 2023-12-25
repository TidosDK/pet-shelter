<?php

namespace Tests\Feature;

use App\Models\Pets;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NavigationControllerTest extends TestCase {
    public function testSinglePetView() {
        $petId = PostControllerTest::getTestPet()->id;

        $this->get('/pet/' . $petId)
            ->assertStatus(200)
            ->assertSee('pet-image')
            ->assertSee(PostControllerTest::getTestPet()->name);
    }
}

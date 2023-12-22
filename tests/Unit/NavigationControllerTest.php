<?php

namespace Tests\Unit;

use Tests\TestCase;

class NavigationControllerTest extends TestCase {
    public function testFrontPageView() {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('frontpage-image');
    }

    public function testAboutUsView() {
        $this->get('/aboutUs')
            ->assertStatus(200)
            ->assertSee('aboutus-image');
    }

    public function testPetsView() {
        $this->get('/pets/dogs')
            ->assertStatus(200);
        $this->get('/pets/cats')
            ->assertStatus(200);

        // TODO: Create test post for dogs
        // TODO: Create test post for cats
    }

    public function testOtherPetsView() {
        $this->get('/pets')
            ->assertStatus(200);

        // TODO: Create test post for other pets
    }

    public function testSinglePetView() {
        $this->get('/pet/1')
            ->assertStatus(200)
            ->assertSee('pet-image');
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;

class NavigationControllerTest extends TestCase {
    public function testFrontPageView() {
        $this->get('/')->assertStatus(200);
    }

    public function testPetsView() {
        $this->get('/pets/dogs')->assertStatus(200);
        $this->get('/pets/cats')->assertStatus(200);
    }

    public function testOtherPetsView() {
        $this->get('/pets')->assertStatus(200);
    }

    public function TestAboutUsView() {
        $this->get('/aboutUs')->assertStatus(200);
    }

    public function testSinglePetView() {
        $this->get('/pet/1')->assertStatus(200);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Unit\PostControllerTest;

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
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('sorting-settings-for-dogs')
            ->assertDontSee('sorting-settings-for-cats');

        $this->get('/pets/cats')
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('sorting-settings-for-cats')
            ->assertDontSee('sorting-settings-for-dogs');
    }

    public function testOtherPetsView() {
        $this->get('/pets')
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('sorting-settings-for-')
            ->assertDontSee('sorting-settings-for-dogs')
            ->assertDontSee('sorting-settings-for-cats');
    }
}

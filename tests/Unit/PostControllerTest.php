<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Feature\UserControllerTest;
use Tests\Feature\PostControllerTest as FeaturePostControllerTest;

class PostControllerTest extends TestCase {
    public function testCreatePostView() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/create')
            ->assertSessionHasNoErrors()
            ->assertStatus(200);
        // Assert see something
        // Try as guest also
    }

    public function testEditPostView() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/edit/' . FeaturePostControllerTest::getTestPet()->id)
            ->assertSessionHasNoErrors()
            ->assertStatus(200);
        // Assert see something
        // Try as guest also
    }

    public function testPostManagementView() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/post-management')
            ->assertStatus(200);
        // Assert see something
        // Try as guest also
    }
}

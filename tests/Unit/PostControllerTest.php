<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Feature\UserControllerTest;
use Tests\Feature\PostControllerTest as FeaturePostControllerTest;

class PostControllerTest extends TestCase {
    public function testCreatePostViewAsUserSuccess() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/create')
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('create-post-title');
    }

    public function testCreatePostViewAsGuestFail() {
        $this->get('/create')
            ->assertRedirect('/login')
            ->assertDontSee('create-post-title');
    }

    public function testEditPostViewAsUserSuccess() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/edit/' . FeaturePostControllerTest::getTestPet()->id)
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('edit-post-title');
    }

    public function testEditPostViewAsGuestFail() {
        $this->get('/edit/' . FeaturePostControllerTest::getTestPet()->id)
            ->assertRedirect('/login')
            ->assertDontSee('edit-post-title');
    }

    public function testPostManagementViewAsUserSuccess() {
        $this->actingAs(UserControllerTest::getTestingUser())
            ->get('/post-management')
            ->assertSessionHasNoErrors()
            ->assertStatus(200)
            ->assertSee('post-management-title');
    }

    public function testPostManagementViewAsGuestFail() {
        $this->get('/post-management')
            ->assertRedirect('/login')
            ->assertDontSee('post-management-title');
    }
}

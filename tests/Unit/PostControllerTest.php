<?php

namespace Tests\Unit;

use Tests\TestCase;

class PostControllerTest extends TestCase {
    public function testCreatePostView() {
        $user = UserControllerTest::getTestUser();

        $this->actingAs($user)
            ->get('/create')
            ->assertStatus(200)
            ->assertSessionHasNoErrors();
    }

    // public function testEditPostView() {
    //     $user = UserControllerTest::getTestUser();

    //     $this->actingAs($user)
    //         ->get('/edit/1')
    //         ->assertStatus(200);
    // }

    public function testPostManagementView() {
        $user = UserControllerTest::getTestUser();

        $this->actingAs($user)
            ->get('/post-management')
            ->assertStatus(200);
    }
}

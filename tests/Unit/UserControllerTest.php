<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase {
    public function testLoginViewGuest() {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee("login-title");
    }

    public function testLoginViewUser() {
        $this->actingAs(new User())
            ->get('/login')
            ->assertRedirect('/')
            ->assertDontSee("login-title");
    }

    public function testSignupViewGuest() {
        $this->get('/signup')
            ->assertStatus(200)
            ->assertSee("signup-title");
    }

    public function testSignupViewUser() {
        $this->actingAs(new User())
            ->get('/signup')
            ->assertRedirect('/')
            ->assertDontSee("signup-title");
    }

    public function testResetPasswordViewGuest() {
        $this->get('/reset-password')
            ->assertStatus(200)
            ->assertSee("reset-password-title");
    }

    public function testResetPasswordViewUser() {
        $this->actingAs(new User())
            ->get('/reset-password')
            ->assertRedirect('/')
            ->assertDontSee("reset-password-title");
    }

    public function testProfileViewGuest() {
        $this->get('/profile')
            ->assertRedirect('/login')
            ->assertDontSee("profile-title");
    }

    public function testProfileViewUser() {
        $this->actingAs(new User())
            ->get('/profile')
            ->assertStatus(200)
            ->assertSee("profile-title");
    }
}

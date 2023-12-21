<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase {

    public static $TEST_NAME = "Test user";
    public static $TEST_EMAIL = "testuser@gmail.com";
    public static $TEST_PASSWORD = "verygoodpassword1234";

    private static $testingUser;

    public static function getTestUser(): User {
        if (UserControllerTest::$testingUser == null) {
            UserControllerTest::$testingUser = User::where('email', UserControllerTest::$TEST_EMAIL)->first();
            if (UserControllerTest::$testingUser) {
            } else {
                UserControllerTest::$testingUser = User::create([
                    'name' => UserControllerTest::$TEST_NAME,
                    'email' => UserControllerTest::$TEST_EMAIL,
                    'password' => bcrypt(UserControllerTest::$TEST_PASSWORD)
                ]);
            }
        }

        return UserControllerTest::$testingUser;
    }


    public function testLoginViewGuest() {
        $this->get('/login')
            ->assertStatus(200);
    }

    public function testLoginViewUser() {
        $this->actingAs($this::getTestUser())
            ->get('/login')
            ->assertRedirect('/');
    }

    public function testSignupViewGuest() {
        $this->get('/signup')
            ->assertStatus(200);
    }

    public function testSignupViewUser() {
        $this->actingAs($this::getTestUser())
            ->get('/signup')
            ->assertRedirect('/');
    }

    public function testResetPasswordViewGuest() {
        $this->get('/reset-password')
            ->assertStatus(200);
    }

    public function testResetPasswordViewUser() {
        $this->actingAs($this::getTestUser())
            ->get('/reset-password')
            ->assertRedirect('/');
    }

    public function testProfileViewGuest() {
        $this->get('/profile')
            ->assertRedirect('/login');
    }

    public function testProfileViewUser() {
        $this->actingAs($this::getTestUser())
            ->get('/profile')
            ->assertStatus(200);
    }

    public function testSignUp() {
        // Pre-cleanup
        if (User::where('email', $this::$TEST_EMAIL . "test")->exists()) {
            User::where('email', $this::$TEST_EMAIL . "test")->delete();
        }

        $this->post('/signup', [
            'name' => $this::$TEST_NAME . "test",
            'email' => $this::$TEST_EMAIL . "test",
            'password' => $this::$TEST_PASSWORD . "test",
            'password_confirmation' => $this::$TEST_PASSWORD . "test"
        ])->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => $this::$TEST_NAME . "test",
            'email' => $this::$TEST_EMAIL . "test"
        ]);
    }

    public function testSignUpEmailAlreadyTaken() {
        $this->post('/signup', [
            'name' => $this::$TEST_NAME . "test",
            'email' => $this::$TEST_EMAIL . "test",
            'password' => $this::$TEST_PASSWORD . "test",
            'password_confirmation' => $this::$TEST_PASSWORD . "test"
        ])->assertSessionHasErrors(["email" => "The email has already been taken."]);
    }

    public function testSignUpInsufficientPasswordLength() {
        $this->post('/signup', [
            'name' => $this::$TEST_NAME . "test1234",
            'email' => $this::$TEST_EMAIL . "test1234",
            'password' => "1234",
            'password_confirmation' => "1234"
        ])->assertSessionHasErrors(["password" => "The password field must be at least 6 characters."]);

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_NAME . "test1234",
            'email' => $this::$TEST_EMAIL . "test1234"
        ]);
    }

    public function testSignUpPasswordsNotMatching() {
        $this->post('/signup', [
            'name' => $this::$TEST_NAME . "test12345",
            'email' => $this::$TEST_EMAIL . "test12345",
            'password' => $this::$TEST_PASSWORD,
            'password_confirmation' => $this::$TEST_PASSWORD . "more"
        ])->assertSessionHasErrors(["password" => "The password field confirmation does not match."]);

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_NAME . "test12345",
            'email' => $this::$TEST_EMAIL . "test12345"
        ]);
    }

    public function testLogin() {
        $response = $this->post('/login', [
            'email' => $this::$TEST_EMAIL . "test",
            'password' => $this::$TEST_PASSWORD . "test"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');

        // Cleanup
        User::where('email', $this::$TEST_EMAIL . "test")->delete();
    }

    // public function testProfileEdit() {
    // }

    // public function testLogOut() {
    // }
}

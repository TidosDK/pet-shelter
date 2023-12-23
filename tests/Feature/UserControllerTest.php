<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase {

    private static $TEST_CREDENTIALS = [
        "name" => "Test user",
        "email" => "testuser@gmail.com",
        "password" => "verygoodpassword1234",
        "phone" => "12345678"
    ];

    private static $testingUser;

    public static function getTestingUser(): User {
        UserControllerTest::$testingUser = User::where('email', UserControllerTest::$TEST_CREDENTIALS['email'])->first();

        if (UserControllerTest::$testingUser == null) {
            UserControllerTest::$testingUser = User::create(UserControllerTest::$TEST_CREDENTIALS);
        }

        return UserControllerTest::$testingUser;
    }

    public function testSignUpSuccess() {
        if (User::where('email', $this::$TEST_CREDENTIALS['email'])->exists()) {
            User::where('email', $this::$TEST_CREDENTIALS['email'])->delete();
        }

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email']
        ]);

        $this->post('/signup', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email'],
            'password' => $this::$TEST_CREDENTIALS['password'],
            'password_confirmation' => $this::$TEST_CREDENTIALS['password']
        ])->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email']
        ]);
    }

    public function testSignUpEmailAlreadyTakenFail() {
        if (!User::where('email', $this::$TEST_CREDENTIALS['email'])->exists()) {
            $this::getTestingUser();
        }

        $this->post('/signup', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email'],
            'password' => $this::$TEST_CREDENTIALS['password'],
            'password_confirmation' => $this::$TEST_CREDENTIALS['password']
        ])->assertSessionHasErrors(["email" => "The email has already been taken."]);
    }

    public function testSignUpInsufficientPasswordLengthFail() {
        $this->post('/signup', [
            'name' => $this::$TEST_CREDENTIALS['name'] . "badpassword",
            'email' => $this::$TEST_CREDENTIALS['email'] . "badpassword",
            'password' => "bad",
            'password_confirmation' => "bad"
        ])->assertSessionHasErrors(["password" => "The password field must be at least 6 characters."]);

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'] . "badpassword",
            'email' => $this::$TEST_CREDENTIALS['email'] . "badpassword"
        ]);
    }

    public function testSignUpPasswordsNotMatchingFail() {
        $this->post('/signup', [
            'name' => $this::$TEST_CREDENTIALS['name'] . "badpasswords",
            'email' => $this::$TEST_CREDENTIALS['email'] . "badpasswords",
            'password' => $this::$TEST_CREDENTIALS['password'],
            'password_confirmation' => $this::$TEST_CREDENTIALS['password'] . "more"
        ])->assertSessionHasErrors(["password" => "The password field confirmation does not match."]);

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'] . "badpasswords",
            'email' => $this::$TEST_CREDENTIALS['email'] . "badpasswords"
        ]);
    }

    public function testLoginSuccess() {
        if (!User::where('email', $this::$TEST_CREDENTIALS['email'])->exists()) {
            $this::getTestingUser();
        }

        $response = $this->post('/login', [
            'email' => $this::$TEST_CREDENTIALS['email'],
            'password' => $this::$TEST_CREDENTIALS['password']
        ])->assertSessionHasNoErrors();

        $this->assertAuthenticatedAs(User::where('email', $this::$TEST_CREDENTIALS['email'])->first());

        $response->assertRedirect('/');
    }

    public function testLoginFail() {
        $response = $this->post('/login', [
            'email' => $this::$TEST_CREDENTIALS['email'] . "wrong",
            'password' => $this::$TEST_CREDENTIALS['password'] . "wrong"
        ])->assertSessionHasErrors(["email" => "Invalid credentials"]);

        $response->assertRedirect('/');
    }

    public function testLogOutSuccess() {
        $this->actingAs($this::getTestingUser())
            ->assertAuthenticatedAs(User::where('email', $this::$TEST_CREDENTIALS['email'])->first());

        $this->post('/logout')
            ->assertRedirect('/login');

        $this->assertGuest();
    }

    public function testProfileEditAsUserSuccess() {
        $this->actingAs($this::getTestingUser())
            ->post('/profile', [
                'name' => $this::$TEST_CREDENTIALS['name'] . 'cool',
                'email' => $this::$TEST_CREDENTIALS['email'] . 'cool',
                'phone' => $this::$TEST_CREDENTIALS['phone']
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => $this::$TEST_CREDENTIALS['name'] . 'cool',
            'email' => $this::$TEST_CREDENTIALS['email'] . 'cool',
            'phone' => $this::$TEST_CREDENTIALS['phone']
        ]);

        // Cleanup
        $this->post('/profile', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email'],
            'phone' => $this::$TEST_CREDENTIALS['phone']
        ])->assertSessionHasNoErrors();
    }

    public function testProfileEditAsGuestFail() {
        $response = $this->post('/profile', [
            'name' => $this::$TEST_CREDENTIALS['name'] . 'cool',
            'email' => $this::$TEST_CREDENTIALS['email'],
            'phone' => $this::$TEST_CREDENTIALS['phone']
        ]);

        $response->assertRedirect('/login');

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'] . 'cool',
            'email' => $this::$TEST_CREDENTIALS['email'],
            'phone' => $this::$TEST_CREDENTIALS['phone']
        ]);
    }

    public function testProfileEditUserBadEmailFail() {
        $this->actingAs($this::getTestingUser())
            ->post('/profile', [
                'name' => $this::$TEST_CREDENTIALS['email'],
                'email' => "badmail",
                'phone' => $this::$TEST_CREDENTIALS['phone']
            ])
            ->assertSessionHasErrors(['email' => 'The email field must be a valid email address.'])
            ->assertRedirect('/');

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => "badmail",
            'phone' => $this::$TEST_CREDENTIALS['phone']
        ]);
    }

    public function testProfileEditUserBadPhoneFail() {
        $this->actingAs($this::getTestingUser())
            ->post('/profile', [
                'name' => $this::$TEST_CREDENTIALS['email'],
                'email' => $this::$TEST_CREDENTIALS['email'],
                'phone' => '123456'
            ])
            ->assertSessionHasErrors(['phone' => 'The phone field must be 8 digits.'])
            ->assertRedirect('/');

        $this->assertDatabaseMissing('users', [
            'name' => $this::$TEST_CREDENTIALS['name'],
            'email' => $this::$TEST_CREDENTIALS['email'],
            'phone' => '123456'
        ]);
    }

    public function testCleanup() {
        // Cleanup
        User::where('email', $this::$TEST_CREDENTIALS['email'])->delete();

        $this->assertDatabaseMissing('users', [
            'email' => $this::$TEST_CREDENTIALS['email']
        ]);
    }
}

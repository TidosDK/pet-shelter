<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pets;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class PostControllerTest extends TestCase {

    private static $TEST_CREDENTIALS = [
        "name" => "Cool pet",
        "description" => "Very good description of very cool pet",
        "age_in_months" => 69,
        "sex" => "Male",
        "price" => 2345,
        "location" => "Odense Zoo",
        "weight" => 54,
        "kidFriendly" => 1,
        "multipleAnimalsFriendly" => 1,
        "castrated" => 1
    ];

    private static $testingPet;

    public static function getTestPet($type_id = 1, $breeds_id = 1): Pets {
        PostControllerTest::$TEST_CREDENTIALS += ["users_id" => UserControllerTest::getTestingUser()->id];
        PostControllerTest::$TEST_CREDENTIALS += ["type_id" => $type_id];
        PostControllerTest::$TEST_CREDENTIALS += ["breeds_id" => $breeds_id];

        PostControllerTest::$testingPet =
            Pets::where('name', PostControllerTest::$TEST_CREDENTIALS['name'])->first();
        if (PostControllerTest::$testingPet == null) {
            PostControllerTest::$testingPet = Pets::create(PostControllerTest::$TEST_CREDENTIALS);
        }

        return PostControllerTest::$testingPet;
    }

    public function testCreatePostSuccess() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasNoErrors()
            ->assertRedirect('/pet/' . ($pet_id = Pets::where('name', $credentials['name'])->first()->id));

        unset($credentials['petImage']);
        $this->assertDatabaseHas('pets', $credentials);
        $this->assertDirectoryExists('/app/storage/app/public/pet_images/p' . $pet_id);

        // Cleanup
        File::deleteDirectory('/app/storage/app/public/pet_images/p' . $pet_id);
        $this->assertDirectoryDoesNotExist('/app/storage/app/public/pet_images/p' . $pet_id);
        Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
    }

    public function testCreatePostNoNameFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["name"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["name" => "The name field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoAgeFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["age_in_months"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["age_in_months" => "The age in months field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoWeightFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["weight"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["weight" => "The weight field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoSexFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["sex"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["sex" => "The sex field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoTypeFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["type_id"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["type_id" => "The type id field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoBreedFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["breeds_id"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["breeds_id" => "The breeds id field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoPriceFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["price"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["price" => "The price field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testCreatePostNoPetImageFail() {
        if (Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();
        }

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);

        $credentials = $this::$TEST_CREDENTIALS;
        $credentials += [
            "type_id" => 1,
            "breeds_id" => 1,
            "petImage" => UploadedFile::fake()->image('fake-image.jpg')
        ];
        unset($credentials["name"]);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/create', $credentials)
            ->assertSessionHasErrors(["name" => "The name field is required."])
            ->assertRedirect('/');

        unset($credentials['petImage']);
        $this->assertDatabaseMissing('pets', $credentials);
    }

    public function testEditPostSuccess() {
        if (!Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            $this::getTestPet();
        }
        $this->assertDatabaseHas('pets', $this::$TEST_CREDENTIALS);

        $edited_credentials = [
            'petId' => $this::getTestPet()->id,
            'name' => "New cool pet",
            'description' => "New cool description",
            'age_in_months' => 123,
            'weight' => 456,
            'sex' => "New crazy gender",
            'location' => "Outside Odense Zoo",
            'type_id' => 2,
            'breeds_id' => 2,
            'price' => 2500,
        ];

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/edit', $edited_credentials)
            ->assertSessionHasNoErrors()
            ->assertRedirect('/pet/' . Pets::where('name', $edited_credentials['name'])->first()->id);

        unset($edited_credentials['petId']);
        $this->assertDatabaseHas('pets', $edited_credentials);

        // Cleanup
        Pets::where('name', $edited_credentials['name'])->delete();
    }

    public function testEditPostNotTheOwnerFail() {
        if (!Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            $this::getTestPet();
        }
        $this->assertDatabaseHas('pets', $this::$TEST_CREDENTIALS);

        $edited_credentials = [
            'petId' => $this::getTestPet()->id,
            'name' => "New cool pet",
            'description' => "New cool description",
            'age_in_months' => 123,
            'weight' => 456,
            'sex' => "New crazy gender",
            'location' => "Outside Odense Zoo",
            'type_id' => 2,
            'breeds_id' => 2,
            'price' => 2500,
        ];

        $this->actingAs(new User())
            ->post('/edit', $edited_credentials)
            ->assertSessionHas('error', 'You are not the owner of this pet!')
            ->assertRedirect('/');

        unset($edited_credentials['petId']);
        $this->assertDatabaseMissing('pets', $edited_credentials);
    }

    // TODO: Could be nice to test with bad inputs. Not needed.

    public function testDeletePostSuccess() {
        if (!Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            $this::getTestPet();
        }

        $this->assertDatabaseHas('pets', $this::$TEST_CREDENTIALS);

        $this->actingAs(UserControllerTest::getTestingUser())
            ->post('/delete-post', ['petId' => $this::getTestPet()->id])
            ->assertSessionHasNoErrors()
            ->assertRedirect('/post-management');

        $this->assertDatabaseMissing('pets', $this::$TEST_CREDENTIALS);
    }

    public function testDeletePostNotTheOwnerFail() {
        if (!Pets::where('name', $this::$TEST_CREDENTIALS['name'])->exists()) {
            $this::getTestPet();
        }

        $this->assertDatabaseHas('pets', $this::$TEST_CREDENTIALS);

        $this->actingAs(new User())
            ->post('/delete-post', ['petId' => $this::getTestPet()->id])
            ->assertSessionHas('error', 'You are not the owner of this pet!')
            ->assertRedirect('/');

        $this->assertDatabaseHas('pets', $this::$TEST_CREDENTIALS);
    }

    public function testCleanup() {
        Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();

        $this->assertDatabaseMissing('pets', [
            'name' => $this::$TEST_CREDENTIALS['name']
        ]);
    }
}

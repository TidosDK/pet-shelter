<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pets;

class PostControllerTest extends TestCase {

    private static $TEST_CREDENTIALS = [
        "name" => "Cool pet",
        "description" => "Very good description of very cool pet",
        "age_in_months" => 69,
        "sex" => "Male",
        "price" => 2345,
        "location" => "Odense Zoo",
        "weight" => 54,
        "kidFriendly" => false,
        "multipleAnimalsFriendly" => false,
        "castrated" => false
    ];

    private static $testingPet;

    public static function getTestPet($type_id = 1, $breeds_id = 1): Pets {
        if (!array_key_exists("users_id", PostControllerTest::$TEST_CREDENTIALS)) {
            PostControllerTest::$TEST_CREDENTIALS += ["users_id" => UserControllerTest::getTestingUser()->id];
        }

        PostControllerTest::$TEST_CREDENTIALS += ["type_id" => $type_id];
        PostControllerTest::$TEST_CREDENTIALS += ["breeds_id" => $breeds_id];

        PostControllerTest::$testingPet =
            Pets::where('name', PostControllerTest::$TEST_CREDENTIALS['name'])
            ->where('description', PostControllerTest::$TEST_CREDENTIALS['description'])
            ->where('age_in_months', PostControllerTest::$TEST_CREDENTIALS['age_in_months'])
            ->where('sex', PostControllerTest::$TEST_CREDENTIALS['sex'])
            ->where('price', PostControllerTest::$TEST_CREDENTIALS['price'])
            ->where('location', PostControllerTest::$TEST_CREDENTIALS['weight'])
            ->where('weight', PostControllerTest::$TEST_CREDENTIALS['weight'])
            ->where('kidFriendly', PostControllerTest::$TEST_CREDENTIALS['kidFriendly'])
            ->where('multipleAnimalsFriendly', PostControllerTest::$TEST_CREDENTIALS['multipleAnimalsFriendly'])
            ->where('castrated', PostControllerTest::$TEST_CREDENTIALS['castrated'])
            ->first();
        if (PostControllerTest::$testingPet == null) {
            PostControllerTest::$testingPet = Pets::create(PostControllerTest::$TEST_CREDENTIALS);
        }

        return PostControllerTest::$testingPet;
    }



    public function testCleanup() {
        Pets::where('name', $this::$TEST_CREDENTIALS['name'])->delete();

        $this->assertDatabaseMissing('pets', [
            'name' => $this::$TEST_CREDENTIALS['name']
        ]);
    }
}

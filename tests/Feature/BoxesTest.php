<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Box;
use Laravel\Passport\Passport;

class BoxesTest extends TestCase
{
    /**
     * Testing accesses
     *
     * @return void
     */
    public function testAccesses()
    {
        $response = $this->getJson(route('mazes.boxes.index', [
            'maze' => 1,
        ]));
        $response->assertUnauthorized();

        $response = $this->getJson(route('mazes.boxes.show', [
            'maze' => 1,
            'box' => 1
        ]));
        $response->assertUnauthorized();

        $response = $this->putJson(route('mazes.boxes.update', [
            'maze' => 1,
            'box' => 1
        ]), [
            'name' => 'Test',
        ]);
        $response->assertUnauthorized();

        $response = $this->deleteJson(route('mazes.boxes.destroy', [
            'maze' => 1,
            'box' => 1
        ]));
        $response->assertUnauthorized();
    }

    /**
     * Test showing resources.
     *
     * @return void
     */
    public function testListing()
    {
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->getJson(route('mazes.boxes.index', [
            'maze' => 1,
        ]));

        $response->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'maze_id',
                        'x',
                        'y',
                        'is_allowed',
                    ]
                ]
            ]);
    }

    /**
     * Test listing resources.
     *
     * @return void
     */
    public function testShow()
    {
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->getJson(route('mazes.boxes.show', [
            'maze' => 1,
            'box' => 1,
        ]));

        $response->assertSuccessful()
            ->assertJsonStructure([
                'id',
                'maze_id',
                'x',
                'y',
                'is_allowed',
            ]);
    }

    /**
     * Test updating resource.
     *
     * @return void
     */
    public function testUpdate()
    {
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->putJson(route('mazes.boxes.update', [
            'maze' => 1,
            'box' => 1,
        ]), [
            'x' => 1,
            'y' => 2,
            'is_allowed' => 1
        ]);

        $response->assertSuccessful()
            ->assertJson([
                'id' => 1,
                'maze_id' => 1,
                'x' => 1,
                'y' => 2,
                'is_allowed' => 1,
            ]);
    }

    /**
     * Test inserting resource.
     *
     * @return void
     */
    public function testStore()
    {
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->postJson(route('mazes.boxes.store', [
            'maze' => 1,
        ]), [
            'x' => '10',
            'y' => '25',
            'is_allowed' => 1
        ]);

        $box = Box::orderBy('id', 'DESC')->first();

        $response->assertSuccessful()
            ->assertJson($box->only([
                'id',
                'maze_id',
                'x',
                'y',
                'is_allowed',
            ]));
    }

    /**
     * Test updating resource.
     *
     * @return void
     */
    public function testDelete()
    {
        $user = User::first();
        $maze = Box::find(1);
        Passport::actingAs($user, ['api']);

        $response = $this->deleteJson(route('mazes.boxes.update', [
            'maze' => 1,
            'box' => 1,
        ]));

        $response->assertSuccessful();
        $this->assertDeleted(app(Box::class)->getTable(), $maze->only([
            'id',
            'maze_id',
            'x',
            'y',
            'is_allowed',
        ]));
    }
}

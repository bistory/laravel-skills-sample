<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Maze;
use Laravel\Passport\Passport;

class MazesTest extends TestCase
{
    /**
     * Testing accesses
     *
     * @return void
     */
    public function testAccesses()
    {
        $response = $this->getJson(route('mazes.index'));
        $response->assertUnauthorized();

        $response = $this->getJson(route('mazes.show', [
            'maze' => 1
        ]));
        $response->assertUnauthorized();

        $response = $this->putJson(route('mazes.update', [
            'maze' => 1
        ]), [
            'name' => 'Test',
        ]);
        $response->assertUnauthorized();

        $response = $this->deleteJson(route('mazes.destroy', [
            'maze' => 1
        ]));
        $response->assertUnauthorized();
    }

    /**
     * Test listing resources.
     *
     * @return void
     */
    public function testListing()
    {
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->getJson(route('mazes.index'));

        $response->assertSuccessful()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
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

        $response = $this->getJson(route('mazes.show', [
            'maze' => 1,
        ]));

        $response->assertSuccessful()
            ->assertJsonStructure([
                'id',
                'name',
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

        $response = $this->postJson(route('mazes.store'), [
            'name' => 'Test \o/'
        ]);

        $box = Maze::orderBy('id', 'DESC')->first();

        $response->assertSuccessful()
            ->assertJson($box->only([
                'id',
                'name',
            ]));
    }

    /**
     * Test updating resource.
     *
     * @return void
     */
    public function testUpdate()
    {
        $this->withoutExceptionHandling();
        $user = User::first();
        Passport::actingAs($user, ['api']);

        $response = $this->putJson(route('mazes.update', [
            'maze' => 1,
        ]), [
            'name' => 'Test',
        ]);

        //dd($response->dump());

        $response->assertSuccessful()
            ->assertJson([
                'id' => 1,
                'name' => 'Test',
            ]);
    }

    /**
     * Test updating resource.
     *
     * @return void
     */
    public function testDelete()
    {
        $user = User::first();
        $maze = Maze::find(1);
        Passport::actingAs($user, ['api']);

        $response = $this->deleteJson(route('mazes.destroy', [
            'maze' => 1,
        ]));

        $response->assertSuccessful();
        $this->assertSoftDeleted(app(Maze::class)->getTable(), $maze->only([
            'id',
            'name',
        ]));
    }
}

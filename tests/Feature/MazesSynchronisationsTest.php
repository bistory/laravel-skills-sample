<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Contracts\LabyrinthCatalog;
use App\Models\MazeSynchronization;

class MazesSynchronisationsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $catalog = new LabyrinthCatalog;
        Http::fake([
            $catalog->getAuthUrl() => Http::response(['access_token' => '1234567890'], 200, ['Headers']),
            $catalog->getCatalogUrl() => Http::response([
                [
                    'uiid' => 2,
                    'title' => 'Torp Inc',
                    'generated_at' => '1972-07-18',
                    'squares' => [
                        [
                            'x' => 0,
                            'y' => 0,
                            'status' => 'not-available',
                        ],
                        [
                            'x' => 0,
                            'y' => 1,
                            'status' => 'available',
                        ],
                        [
                            'x' => 0,
                            'y' => 2,
                            'status' => 'available',
                        ],
                    ]
                ]
            ], 200, ['Headers']),
        ]);

        $this->artisan('sync:mazes')
            ->assertExitCode(1);

        $this->assertDatabaseCount(app(MazeSynchronization::class)->getTable(), 1);
    }
}

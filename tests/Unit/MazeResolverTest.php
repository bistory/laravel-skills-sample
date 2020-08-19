<?php

namespace Tests\Unit;

use App\Classes\Resolvers\MazeResolver;
use App\Models\Maze;
use Tests\TestCase;

class MazeResolverTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testResolveMaze1()
    {
        $maze = Maze::findOrFail(1);
        $start = $maze->boxes()
            ->where('x', 5)
            ->where('y', 0)
            ->firstOrFail();

        $end = $maze->boxes()
            ->where('x', 9)
            ->where('y', 10)
            ->firstOrFail();

        $this->assertEquals(15, (new MazeResolver($maze, $start, $end))->resolve());
    }

    /**
     *
     * @return void
     */
    public function testResolveMaze2()
    {
        $maze = Maze::findOrFail(2);
        $start = $maze->boxes()
            ->where('x', 0)
            ->where('y', 5)
            ->firstOrFail();

        $end = $maze->boxes()
            ->where('x', 12)
            ->where('y', 3)
            ->firstOrFail();

        $this->assertEquals(23, (new MazeResolver($maze, $start, $end))->resolve());
    }

    /**
     *
     * @return void
     */
    public function testResolveMaze2NotResolvable()
    {
        $maze = Maze::findOrFail(2);
        $start = $maze->boxes()
            ->where('x', 0)
            ->where('y', 5)
            ->firstOrFail();

        $end = $maze->boxes()
            ->where('x', 12)
            ->where('y', 2)
            ->firstOrFail();

        $this->assertEquals(false, (new MazeResolver($maze, $start, $end))->resolve());
    }
}

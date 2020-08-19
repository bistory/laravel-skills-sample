<?php

use App\Models\Maze;
use Illuminate\Database\Seeder;

class MazeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createMaze1();
        $this->createMaze2();
    }

    /**
     *
     */
    private function createMaze1(): void
    {
        $maze = Maze::create([
            'name' => 'Maze #1',
        ]);

        repositories()->getBoxRepository()->create($maze, 0, 0);
        repositories()->getBoxRepository()->create($maze, 0, 1);
        repositories()->getBoxRepository()->create($maze, 0, 2);
        repositories()->getBoxRepository()->create($maze, 0, 3);
        repositories()->getBoxRepository()->create($maze, 0, 4);
        repositories()->getBoxRepository()->create($maze, 0, 5);
        repositories()->getBoxRepository()->create($maze, 0, 6);
        repositories()->getBoxRepository()->create($maze, 0, 7);
        repositories()->getBoxRepository()->create($maze, 0, 8);
        repositories()->getBoxRepository()->create($maze, 0, 9);
        repositories()->getBoxRepository()->create($maze, 0, 10);

        repositories()->getBoxRepository()->create($maze, 1, 0);
        repositories()->getBoxRepository()->create($maze, 1, 1);
        repositories()->getBoxRepository()->create($maze, 1, 2);
        repositories()->getBoxRepository()->create($maze, 1, 3);
        repositories()->getBoxRepository()->create($maze, 1, 4);
        repositories()->getBoxRepository()->create($maze, 1, 5);
        repositories()->getBoxRepository()->create($maze, 1, 6, true);
        repositories()->getBoxRepository()->create($maze, 1, 7);
        repositories()->getBoxRepository()->create($maze, 1, 8);
        repositories()->getBoxRepository()->create($maze, 1, 9);
        repositories()->getBoxRepository()->create($maze, 1, 10);

        repositories()->getBoxRepository()->create($maze, 2, 0);
        repositories()->getBoxRepository()->create($maze, 2, 1);
        repositories()->getBoxRepository()->create($maze, 2, 2);
        repositories()->getBoxRepository()->create($maze, 2, 3);
        repositories()->getBoxRepository()->create($maze, 2, 4, true);
        repositories()->getBoxRepository()->create($maze, 2, 5, true);
        repositories()->getBoxRepository()->create($maze, 2, 6, true);
        repositories()->getBoxRepository()->create($maze, 2, 7, true);
        repositories()->getBoxRepository()->create($maze, 2, 8);
        repositories()->getBoxRepository()->create($maze, 2, 9);
        repositories()->getBoxRepository()->create($maze, 2, 10);

        repositories()->getBoxRepository()->create($maze, 3, 0);
        repositories()->getBoxRepository()->create($maze, 3, 1, true);
        repositories()->getBoxRepository()->create($maze, 3, 2);
        repositories()->getBoxRepository()->create($maze, 3, 3);
        repositories()->getBoxRepository()->create($maze, 3, 4);
        repositories()->getBoxRepository()->create($maze, 3, 5);
        repositories()->getBoxRepository()->create($maze, 3, 6);
        repositories()->getBoxRepository()->create($maze, 3, 7, true);
        repositories()->getBoxRepository()->create($maze, 3, 8);
        repositories()->getBoxRepository()->create($maze, 3, 9);
        repositories()->getBoxRepository()->create($maze, 3, 10);

        repositories()->getBoxRepository()->create($maze, 4, 0);
        repositories()->getBoxRepository()->create($maze, 4, 1, true);
        repositories()->getBoxRepository()->create($maze, 4, 2);
        repositories()->getBoxRepository()->create($maze, 4, 3);
        repositories()->getBoxRepository()->create($maze, 4, 4);
        repositories()->getBoxRepository()->create($maze, 4, 5);
        repositories()->getBoxRepository()->create($maze, 4, 6);
        repositories()->getBoxRepository()->create($maze, 4, 7, true);
        repositories()->getBoxRepository()->create($maze, 4, 8);
        repositories()->getBoxRepository()->create($maze, 4, 9);
        repositories()->getBoxRepository()->create($maze, 4, 10);

        repositories()->getBoxRepository()->create($maze, 5, 0, true);
        repositories()->getBoxRepository()->create($maze, 5, 1, true);
        repositories()->getBoxRepository()->create($maze, 5, 2, true);
        repositories()->getBoxRepository()->create($maze, 5, 3, true);
        repositories()->getBoxRepository()->create($maze, 5, 4, true);
        repositories()->getBoxRepository()->create($maze, 5, 5, true);
        repositories()->getBoxRepository()->create($maze, 5, 6, true);
        repositories()->getBoxRepository()->create($maze, 5, 7, true);
        repositories()->getBoxRepository()->create($maze, 5, 8, true);
        repositories()->getBoxRepository()->create($maze, 5, 9);
        repositories()->getBoxRepository()->create($maze, 5, 10);

        repositories()->getBoxRepository()->create($maze, 6, 0);
        repositories()->getBoxRepository()->create($maze, 6, 1);
        repositories()->getBoxRepository()->create($maze, 6, 2);
        repositories()->getBoxRepository()->create($maze, 6, 3, true);
        repositories()->getBoxRepository()->create($maze, 6, 4);
        repositories()->getBoxRepository()->create($maze, 6, 5);
        repositories()->getBoxRepository()->create($maze, 6, 6);
        repositories()->getBoxRepository()->create($maze, 6, 7);
        repositories()->getBoxRepository()->create($maze, 6, 8, true);
        repositories()->getBoxRepository()->create($maze, 6, 9);
        repositories()->getBoxRepository()->create($maze, 6, 10);

        repositories()->getBoxRepository()->create($maze, 7, 0);
        repositories()->getBoxRepository()->create($maze, 7, 1, true);
        repositories()->getBoxRepository()->create($maze, 7, 2, true);
        repositories()->getBoxRepository()->create($maze, 7, 3, true);
        repositories()->getBoxRepository()->create($maze, 7, 4);
        repositories()->getBoxRepository()->create($maze, 7, 5);
        repositories()->getBoxRepository()->create($maze, 7, 6);
        repositories()->getBoxRepository()->create($maze, 7, 7);
        repositories()->getBoxRepository()->create($maze, 7, 8, true);
        repositories()->getBoxRepository()->create($maze, 7, 9, true);
        repositories()->getBoxRepository()->create($maze, 7, 10);

        repositories()->getBoxRepository()->create($maze, 8, 0);
        repositories()->getBoxRepository()->create($maze, 8, 1);
        repositories()->getBoxRepository()->create($maze, 8, 2);
        repositories()->getBoxRepository()->create($maze, 8, 3, true);
        repositories()->getBoxRepository()->create($maze, 8, 4);
        repositories()->getBoxRepository()->create($maze, 8, 5);
        repositories()->getBoxRepository()->create($maze, 8, 6);
        repositories()->getBoxRepository()->create($maze, 8, 7);
        repositories()->getBoxRepository()->create($maze, 8, 8);
        repositories()->getBoxRepository()->create($maze, 8, 9, true);
        repositories()->getBoxRepository()->create($maze, 8, 10);

        repositories()->getBoxRepository()->create($maze, 9, 0);
        repositories()->getBoxRepository()->create($maze, 9, 1);
        repositories()->getBoxRepository()->create($maze, 9, 2);
        repositories()->getBoxRepository()->create($maze, 9, 3);
        repositories()->getBoxRepository()->create($maze, 9, 4);
        repositories()->getBoxRepository()->create($maze, 9, 5);
        repositories()->getBoxRepository()->create($maze, 9, 6);
        repositories()->getBoxRepository()->create($maze, 9, 7);
        repositories()->getBoxRepository()->create($maze, 9, 8);
        repositories()->getBoxRepository()->create($maze, 9, 9, true);
        repositories()->getBoxRepository()->create($maze, 9, 10, true);

        repositories()->getBoxRepository()->create($maze, 10, 0);
        repositories()->getBoxRepository()->create($maze, 10, 1);
        repositories()->getBoxRepository()->create($maze, 10, 2);
        repositories()->getBoxRepository()->create($maze, 10, 3);
        repositories()->getBoxRepository()->create($maze, 10, 4);
        repositories()->getBoxRepository()->create($maze, 10, 5);
        repositories()->getBoxRepository()->create($maze, 10, 6);
        repositories()->getBoxRepository()->create($maze, 10, 7);
        repositories()->getBoxRepository()->create($maze, 10, 8);
        repositories()->getBoxRepository()->create($maze, 10, 9);
        repositories()->getBoxRepository()->create($maze, 10, 10);
    }

    /**
     *
     */
    private function createMaze2(): void
    {
        $maze = Maze::create([
            'name' => 'Maze #2',
        ]);

        repositories()->getBoxRepository()->create($maze, 0, 0);
        repositories()->getBoxRepository()->create($maze, 0, 1);
        repositories()->getBoxRepository()->create($maze, 0, 2);
        repositories()->getBoxRepository()->create($maze, 0, 3);
        repositories()->getBoxRepository()->create($maze, 0, 4);
        repositories()->getBoxRepository()->create($maze, 0, 5, true);
        repositories()->getBoxRepository()->create($maze, 0, 6);
        repositories()->getBoxRepository()->create($maze, 0, 7);
        repositories()->getBoxRepository()->create($maze, 0, 8);
        repositories()->getBoxRepository()->create($maze, 0, 9);
        repositories()->getBoxRepository()->create($maze, 0, 10);

        repositories()->getBoxRepository()->create($maze, 1, 0);
        repositories()->getBoxRepository()->create($maze, 1, 1);
        repositories()->getBoxRepository()->create($maze, 1, 2, true);
        repositories()->getBoxRepository()->create($maze, 1, 3, true);
        repositories()->getBoxRepository()->create($maze, 1, 4, true);
        repositories()->getBoxRepository()->create($maze, 1, 5, true);
        repositories()->getBoxRepository()->create($maze, 1, 6);
        repositories()->getBoxRepository()->create($maze, 1, 7);
        repositories()->getBoxRepository()->create($maze, 1, 8, true);
        repositories()->getBoxRepository()->create($maze, 1, 9, true);
        repositories()->getBoxRepository()->create($maze, 1, 10);

        repositories()->getBoxRepository()->create($maze, 2, 0);
        repositories()->getBoxRepository()->create($maze, 2, 1);
        repositories()->getBoxRepository()->create($maze, 2, 2, true);
        repositories()->getBoxRepository()->create($maze, 2, 3);
        repositories()->getBoxRepository()->create($maze, 2, 4);
        repositories()->getBoxRepository()->create($maze, 2, 5, true);
        repositories()->getBoxRepository()->create($maze, 2, 6, true);
        repositories()->getBoxRepository()->create($maze, 2, 7, true);
        repositories()->getBoxRepository()->create($maze, 2, 8, true);
        repositories()->getBoxRepository()->create($maze, 2, 9);
        repositories()->getBoxRepository()->create($maze, 2, 10);

        repositories()->getBoxRepository()->create($maze, 3, 0);
        repositories()->getBoxRepository()->create($maze, 3, 1);
        repositories()->getBoxRepository()->create($maze, 3, 2, true);
        repositories()->getBoxRepository()->create($maze, 3, 3);
        repositories()->getBoxRepository()->create($maze, 3, 4);
        repositories()->getBoxRepository()->create($maze, 3, 5);
        repositories()->getBoxRepository()->create($maze, 3, 6);
        repositories()->getBoxRepository()->create($maze, 3, 7);
        repositories()->getBoxRepository()->create($maze, 3, 8, true);
        repositories()->getBoxRepository()->create($maze, 3, 9);
        repositories()->getBoxRepository()->create($maze, 3, 10);

        repositories()->getBoxRepository()->create($maze, 4, 0);
        repositories()->getBoxRepository()->create($maze, 4, 1);
        repositories()->getBoxRepository()->create($maze, 4, 2, true);
        repositories()->getBoxRepository()->create($maze, 4, 3, true);
        repositories()->getBoxRepository()->create($maze, 4, 4, true);
        repositories()->getBoxRepository()->create($maze, 4, 5);
        repositories()->getBoxRepository()->create($maze, 4, 6);
        repositories()->getBoxRepository()->create($maze, 4, 7);
        repositories()->getBoxRepository()->create($maze, 4, 8, true);
        repositories()->getBoxRepository()->create($maze, 4, 9);
        repositories()->getBoxRepository()->create($maze, 4, 10);

        repositories()->getBoxRepository()->create($maze, 5, 0);
        repositories()->getBoxRepository()->create($maze, 5, 1);
        repositories()->getBoxRepository()->create($maze, 5, 2);
        repositories()->getBoxRepository()->create($maze, 5, 3);
        repositories()->getBoxRepository()->create($maze, 5, 4);
        repositories()->getBoxRepository()->create($maze, 5, 5);
        repositories()->getBoxRepository()->create($maze, 5, 6);
        repositories()->getBoxRepository()->create($maze, 5, 7);
        repositories()->getBoxRepository()->create($maze, 5, 8, true);
        repositories()->getBoxRepository()->create($maze, 5, 9);
        repositories()->getBoxRepository()->create($maze, 5, 10);

        repositories()->getBoxRepository()->create($maze, 6, 0);
        repositories()->getBoxRepository()->create($maze, 6, 1);
        repositories()->getBoxRepository()->create($maze, 6, 2);
        repositories()->getBoxRepository()->create($maze, 6, 3);
        repositories()->getBoxRepository()->create($maze, 6, 4);
        repositories()->getBoxRepository()->create($maze, 6, 5);
        repositories()->getBoxRepository()->create($maze, 6, 6, true);
        repositories()->getBoxRepository()->create($maze, 6, 7, true);
        repositories()->getBoxRepository()->create($maze, 6, 8, true);
        repositories()->getBoxRepository()->create($maze, 6, 9);
        repositories()->getBoxRepository()->create($maze, 6, 10);

        repositories()->getBoxRepository()->create($maze, 7, 0);
        repositories()->getBoxRepository()->create($maze, 7, 1);
        repositories()->getBoxRepository()->create($maze, 7, 2);
        repositories()->getBoxRepository()->create($maze, 7, 3);
        repositories()->getBoxRepository()->create($maze, 7, 4);
        repositories()->getBoxRepository()->create($maze, 7, 5);
        repositories()->getBoxRepository()->create($maze, 7, 6, true);
        repositories()->getBoxRepository()->create($maze, 7, 7);
        repositories()->getBoxRepository()->create($maze, 7, 8);
        repositories()->getBoxRepository()->create($maze, 7, 9, true);
        repositories()->getBoxRepository()->create($maze, 7, 10);

        repositories()->getBoxRepository()->create($maze, 8, 0);
        repositories()->getBoxRepository()->create($maze, 8, 1, true);
        repositories()->getBoxRepository()->create($maze, 8, 2);
        repositories()->getBoxRepository()->create($maze, 8, 3, true);
        repositories()->getBoxRepository()->create($maze, 8, 4, true);
        repositories()->getBoxRepository()->create($maze, 8, 5, true);
        repositories()->getBoxRepository()->create($maze, 8, 6, true);
        repositories()->getBoxRepository()->create($maze, 8, 7);
        repositories()->getBoxRepository()->create($maze, 8, 8);
        repositories()->getBoxRepository()->create($maze, 8, 9, true);
        repositories()->getBoxRepository()->create($maze, 8, 10);

        repositories()->getBoxRepository()->create($maze, 9, 0);
        repositories()->getBoxRepository()->create($maze, 9, 1, true);
        repositories()->getBoxRepository()->create($maze, 9, 2, true);
        repositories()->getBoxRepository()->create($maze, 9, 3, true);
        repositories()->getBoxRepository()->create($maze, 9, 4);
        repositories()->getBoxRepository()->create($maze, 9, 5);
        repositories()->getBoxRepository()->create($maze, 9, 6, true);
        repositories()->getBoxRepository()->create($maze, 9, 7, true);
        repositories()->getBoxRepository()->create($maze, 9, 8, true);
        repositories()->getBoxRepository()->create($maze, 9, 9, true);
        repositories()->getBoxRepository()->create($maze, 9, 10);

        repositories()->getBoxRepository()->create($maze, 10, 0);
        repositories()->getBoxRepository()->create($maze, 10, 1);
        repositories()->getBoxRepository()->create($maze, 10, 2, true);
        repositories()->getBoxRepository()->create($maze, 10, 3);
        repositories()->getBoxRepository()->create($maze, 10, 4);
        repositories()->getBoxRepository()->create($maze, 10, 5);
        repositories()->getBoxRepository()->create($maze, 10, 6);
        repositories()->getBoxRepository()->create($maze, 10, 7);
        repositories()->getBoxRepository()->create($maze, 10, 8);
        repositories()->getBoxRepository()->create($maze, 10, 9, true);
        repositories()->getBoxRepository()->create($maze, 10, 10);

        repositories()->getBoxRepository()->create($maze, 11, 0);
        repositories()->getBoxRepository()->create($maze, 11, 1, true);
        repositories()->getBoxRepository()->create($maze, 11, 2, true);
        repositories()->getBoxRepository()->create($maze, 11, 3, true);
        repositories()->getBoxRepository()->create($maze, 11, 4);
        repositories()->getBoxRepository()->create($maze, 11, 5);
        repositories()->getBoxRepository()->create($maze, 11, 6);
        repositories()->getBoxRepository()->create($maze, 11, 7);
        repositories()->getBoxRepository()->create($maze, 11, 8);
        repositories()->getBoxRepository()->create($maze, 11, 9, true);
        repositories()->getBoxRepository()->create($maze, 11, 10);

        repositories()->getBoxRepository()->create($maze, 12, 0);
        repositories()->getBoxRepository()->create($maze, 12, 1);
        repositories()->getBoxRepository()->create($maze, 12, 2);
        repositories()->getBoxRepository()->create($maze, 12, 3, true);
        repositories()->getBoxRepository()->create($maze, 12, 4);
        repositories()->getBoxRepository()->create($maze, 12, 5);
        repositories()->getBoxRepository()->create($maze, 12, 6);
        repositories()->getBoxRepository()->create($maze, 12, 7);
        repositories()->getBoxRepository()->create($maze, 12, 8);
        repositories()->getBoxRepository()->create($maze, 12, 9);
        repositories()->getBoxRepository()->create($maze, 12, 10);
    }
}

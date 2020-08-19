<?php

namespace App\Classes\Generators;

use Faker\Factory;

class MazeGenerator
{
    /**
     * @return array
     */
    public function generate(): array
    {
        $mazes = [];
        $mazes[] = $this->generateMaze(2);

        $number = rand(2, 5);
        for ($i = 0; $i <= $number; $i++) {
            $mazes[] = $this->generateMaze();
        }

        return $mazes;
    }

    /**
     * @param int|null $id
     * @return array
     */
    private function generateMaze(int $id = null): array
    {
        $faker = Factory::create();

        return [
            'uiid' => $id ?? rand(10, 150),
            'title' => $faker->company,
            'generated_at' => $faker->date(),
            'squares' => $this->generateBoxes()
        ];
    }

    /**
     * @return array
     */
    private function generateBoxes(): array
    {
        $boxes = [];

        $max_x = rand(5, 15);
        $max_y = rand(5, 15);

        for ($x = 0; $x <= $max_x; $x++) {
            for ($y = 0; $y <= $max_y; $y++) {
                $boxes[] = $this->generateBox($x, $y);
            }
        }

        return $boxes;
    }

    /**
     * @param int $x
     * @param int $y
     * @return array
     */
    private function generateBox(int $x, int $y): array
    {
        $status = rand(0, 1);

        return [
            'x' => $x,
            'y' => $y,
            'status' => $status === 1 ? 'available' : 'not-available'
        ];
    }
}

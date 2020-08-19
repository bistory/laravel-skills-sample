<?php

namespace App\Classes\Resolvers;

use App\Models\Box;
use App\Models\Maze;

class MazeResolver
{
    /**
     * @var array
     */
    private array $maze_representation = [];

    /**
     * @var Box
     */
    private Box $start;

    /**
     * @var Box
     */
    private Box $end;

    /**
     * @var int
     */
    private int $count = 0;

    /**
     * MazeResolver constructor.
     * @param Maze $maze
     * @param Box $start
     * @param Box $end
     */
    public function __construct(Maze $maze, Box $start, Box $end)
    {
        $maze->boxes()->each(function ($box) {
            if(!isset($this->maze_representation[$box->x])) {
                $this->maze_representation[$box->x] = [];
            }

            $this->maze_representation[$box->x][$box->y] = [
                'allowed' => $box->is_allowed,
                'explored' => false,
            ];
        });

        $this->start = $start;
        $this->end = $end;
    }

    /**
     *
     * @param int $x
     * @param int $y
     */
    private function explore($x, $y)
    {
        if(isset($this->maze_representation[$x][$y]) && ($this->isAllowed($x, $y) || $this->isStart($x, $y))) {
            if($this->isEnd($x, $y)) {
                $this->count++;
                return true;
            }

            $this->setBoxExplored($x, $y);

            if($this->explore($x, $y+1) || $this->explore($x+1, $y) || $this->explore($x-1, $y) || $this->explore($x, $y-1)) {
                $this->count++;
                return true;
            }
        }

        return false;
    }

    /**
     *
     * @param int $x
     * @param int $y
     * @param bool $is_explored
     * @return void
     */
    private function setBoxExplored($x, $y, $is_explored = true)
    {
        $this->maze_representation[$x][$y]['explored'] = $is_explored;
    }

    /**
     *
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function isAllowed($x, $y): bool
    {
        return $this->maze_representation[$x][$y]['allowed'] && !$this->maze_representation[$x][$y]['explored'];
    }

    /**
     *
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function isStart($x, $y): bool
    {
        return $x == $this->start->x && $y == $this->start->y;
    }

    /**
     *
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function isEnd($x, $y): bool
    {
        return $x == $this->end->x && $y == $this->end->y;
    }

    /**
     *
     * @return int|false
     */
    public function resolve()
    {
        if(!$this->isAllowed($this->start->x, $this->start->y) || !$this->isAllowed($this->end->x, $this->end->y)) {
            return false;
        }

        $this->explore($this->start->x, $this->start->y);

        return $this->count;
    }
}

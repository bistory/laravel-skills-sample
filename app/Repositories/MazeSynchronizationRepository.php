<?php

namespace App\Repositories;

use App\Models\Maze;
use App\Models\MazeSynchronization;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MazeSynchronizationRepository extends Repository
{
    /**
     * @var MazeSynchronization
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     */
    public function __construct()
    {
        $this->model = new MazeSynchronization;
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
    * @param int $id
    * @return MazeSynchronization
    */
    public function find(int $id): ?MazeSynchronization
    {
        return $this->model->find($id);
    }

    /**
     * @param Maze $maze
     * @param int $id
     * @param array $boxes
     * @return MazeSynchronization
     */
    public function create(Maze $maze, int $id, array $boxes): MazeSynchronization
    {
        return $maze->synchronization()->create([
            'id' => $id,
            'boxes_hash' => $boxes,
        ]);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }
}

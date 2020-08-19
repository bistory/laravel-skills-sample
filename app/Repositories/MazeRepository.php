<?php

namespace App\Repositories;

use App\Models\Maze;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MazeRepository extends Repository
{
    /**
     * @var Maze
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     */
    public function __construct()
    {
        $this->model = new Maze;
    }

    /**
    * @return LengthAwarePaginator
    */
    public function allPaginated(): LengthAwarePaginator
    {
        return $this->model->paginate();
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
    * @return Maze
    */
    public function find(int $id): ?Maze
    {
        return $this->model->find($id);
    }

    /**
     * @param string $name
     * @return Maze
     */
    public function create(string $name): Maze
    {
        return $this->model->create([
            'name' => $name,
        ]);
    }

    /**
     * @param int $id
     * @param string $name
     * @return Maze
     */
    public function update(int $id, string $name): Maze
    {
        $this->model->where('id', $id)->update([
            'name' => $name
        ]);

        return $this->find($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}

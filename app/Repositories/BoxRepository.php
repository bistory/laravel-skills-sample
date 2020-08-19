<?php

namespace App\Repositories;

use App\Models\Box;
use App\Models\Maze;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BoxRepository extends Repository
{
    /**
     * @var Box
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     */
    public function __construct()
    {
        $this->model = new Box;
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
    * @return Box
    */
    public function find(int $id): ?Box
    {
        return $this->model->find($id);
    }

    /**
     * @param Maze $maze
     * @param int $x
     * @param int $y
     * @param bool $is_allowed
     * @return Box
     */
    public function create(Maze $maze, int $x, int $y, bool $is_allowed = false): Box
    {
        return $maze->boxes()->create([
            'x' => $x,
            'y' => $y,
            'is_allowed' => $is_allowed
        ]);
    }

    /**
     * @param int $id
     * @param int $x
     * @param int $y
     * @param bool $is_allowed
     * @return Box
     */
    public function update(int $id, int $x, int $y, bool $is_allowed = false): Box
    {
        $this->model->where('id', $id)->update([
            'x' => $x,
            'y' => $y,
            'is_allowed' => $is_allowed
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

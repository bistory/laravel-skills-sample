<?php

namespace App\Http\Controllers;

use App\Models\Maze;
use Illuminate\Http\Request;
use App\Http\Requests\MazeRequest;
use App\Repositories\MazeRepository;

class MazeController extends Controller
{
    /** @var MazeRepository */
    private $mazeRepository;

    public function __construct(MazeRepository $mazeRepository)
    {
        $this->mazeRepository = $mazeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index()
    {
        return $this->mazeRepository->allPaginated();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MazeRequest  $request
     * @return \App\Models\Maze
     */
    public function store(MazeRequest $request): Maze
    {
        return $this->mazeRepository->create($request->input('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maze  $maze
     * @return \App\Models\Maze
     */
    public function show(Maze $maze): Maze
    {
        return $maze;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MazeRequest  $request
     * @param  \App\Models\Maze  $maze
     * @return \App\Models\Maze
     */
    public function update(MazeRequest $request, Maze $maze): Maze
    {
        $this->mazeRepository->update($maze->id, $request->input('name'));

        return $maze->find($maze->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maze  $maze
     * @return void
     */
    public function destroy(Maze $maze): void
    {
        $this->mazeRepository->delete($maze->id);
    }
}

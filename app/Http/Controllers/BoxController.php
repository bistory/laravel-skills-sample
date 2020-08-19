<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Maze;
use Illuminate\Http\Request;
use App\Http\Requests\BoxRequest;
use App\Repositories\BoxRepository;

class BoxController extends Controller
{
    /** @var BoxRepository */
    private $boxRepository;

    public function __construct(BoxRepository $boxRepository)
    {
        $this->boxRepository = $boxRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Maze  $maze
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Maze $maze)
    {
        return $this->boxRepository->allPaginated();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BoxRequest  $request
     * @param  \App\Models\Maze  $maze
     * @return \App\Models\Box
     */
    public function store(BoxRequest $request, Maze $maze): Box
    {
        return $this->boxRepository->create($maze, $request->input('x'), $request->input('y'), $request->input('is_allowed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maze  $maze
     * @param  \App\Models\Box  $box
     * @return \App\Models\Box
     */
    public function show(Maze $maze, Box $box): Box
    {
        return $box;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BoxRequest  $request
     * @param  \App\Models\Maze  $maze
     * @param  \App\Models\Box  $box
     * @return \App\Models\Box
     */
    public function update(BoxRequest $request, Maze $maze, Box $box): Box
    {
        return $this->boxRepository->update($box->id, $request->input('x'), $request->input('y'), $request->input('is_allowed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maze  $maze
     * @param  \App\Models\Box  $box
     * @return void
     */
    public function destroy(Maze $maze, Box $box): void
    {
        $this->boxRepository->delete($box->id);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\MazeRepository;
use App\Repositories\BoxRepository;
use App\Repositories\MazeSynchronizationRepository;
use App\Contracts\LabyrinthCatalog;
use App\Models\Maze;
use App\Models\Box;

class SyncMazesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:mazes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /** @var MazeRepository */
    private $mazeRepository;

    /** @var BoxRepository */
    private $boxRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mazeRepository = new MazeRepository;
        $this->boxRepository = new BoxRepository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $catalog = (new LabyrinthCatalog)->get();

        $catalog->each(function($maze_data) {
            $maze = $this->syncMaze($maze_data);

            collect($maze_data['squares'])->each(function($box_data) use ($maze) {
                $this->syncBox($maze, $box_data);
            });
        });

        $this->info(__('Synced :count mazes.', ['count' => $catalog->count()]));

        return 1;
    }

    /**
     * Synchronize a maze from its data.
     *
     * @param array $maze_data
     * @return Maze
     */
    private function syncMaze($maze_data): Maze
    {
        $maze = new MazeRepository;
        $maze_sync = new MazeSynchronizationRepository;

        $maze_record = $maze_sync->find($maze_data['uiid']);

        if(empty($maze_record) || $maze_record->boxesChanged($maze_data['squares'])) {
            if(!empty($maze_record)) {
                $maze->delete($maze_record->id);
                $maze_sync->delete($maze_record->id);
            }

            $maze_record = $maze->create($maze_data['title']);
            $maze_sync->create($maze_record, $maze_data['uiid'], $maze_data['squares']);
        }

        return $maze_record;
    }

    /**
     * Synchronize a maze from its data.
     *
     * @param Maze $maze
     * @param array $box_data
     * @return Box
     */
    private function syncBox(Maze $maze, $box_data): Box
    {
        $is_available = $box_data['x'] == 'available';

        return (new BoxRepository)->create($maze, $box_data['x'], $box_data['y'], $is_available);
    }
}

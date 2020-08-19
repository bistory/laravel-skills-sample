<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MazeRepository;
use App\Repositories\BoxRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        BoxRepository::class => BoxRepository::class,
        MazeRepository::class => MazeRepository::class,
    ];
}

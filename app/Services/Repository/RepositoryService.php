<?php

namespace App\Services\Repository;

use App\Repositories\BoxRepository;
use App\Repositories\Repository;
use BadFunctionCallException;
use Illuminate\Support\Str;

/**
 * Class RepositoryService
 * @package App\Services\Repository
 * @method BoxRepository getBoxRepository()
 */
class RepositoryService
{
    /**
     * Storage for the loaded repositories
     * @var array
     */
    protected $storage = [];

    /**`
     * @noinspection MagicMethodsValidityInspection
     * @param string $name
     * @return Repository|null
     */
    public function __get(string $name): ?Repository
    {
        $repository = $this->parseVariable($name);
        $repositories = $this->listRepositories();

        if (!$this->isValidRepository($repository, $repositories)) {
            return null;
        }

        return $this->loadRepository($repository);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function parseVariable(string $name): string
    {
        return ucfirst(Str::camel(strtolower($name))) . 'Repository';
    }

    /**
     * Get a list of valid repositories classes from the app/Repositories folder
     * @return array
     */
    protected function listRepositories(): array
    {
        $files = [];
        $path = app_path('Repositories') . '/*Repository.php';

        // From a list of files, get the classes names
        foreach (glob($path) as $file) {
            $files[] = basename(class_basename($file), '.php');
        }

        return $files;
    }

    /**
     * Make sure the requested repository is in our list
     * @param string $repository
     * @param array $repositories
     * @return bool
     */
    protected function isValidRepository(string $repository, array $repositories): bool
    {
        return in_array($repository, $repositories, true);
    }

    /**
     * Create an instance of the repository or load it from the storage
     * @param string $repository
     * @return mixed
     */
    protected function loadRepository(string $repository): ?Repository
    {
        if ($this->isAlreadyLoaded($repository)) {
            return $this->getRepositoryFromStorage($repository);
        }

        $class = 'App\Repositories\\' . $repository;
        return $this->storage[$repository] = new $class($this);
    }

    /**
     * Check if the repository is already in the storage
     * @param string $name
     * @return bool
     */
    protected function isAlreadyLoaded(string $name): bool
    {
        return in_array($name, $this->storage, true);
    }

    /**
     * Get the repository instance from storage
     * @param string $name
     * @return Repository|null
     */
    protected function getRepositoryFromStorage(string $name): ?Repository
    {
        return $this->storage[$name] ?? null;
    }

    /**
     * @param string $name
     * @param $arguments
     * @return Repository|null
     */
    public function __call($name, $arguments): ?Repository
    {
        $repository = $this->parseFunction($name);
        $repositories = $this->listRepositories();

        if (!$this->isValidRepository($repository, $repositories)) {
            return null;
        }

        return $this->loadRepository($repository);
    }

    /**
     * @param string $function
     * @return string
     */
    protected function parseFunction(string $function): string
    {
        // A valid funciton is getSomethingRepository()
        if (!preg_match('/^get(?P<repository>[a-zA-Z]+Repository)$/i', $function, $matches)) {
            throw new BadFunctionCallException("Unknown function {$function} in RepositoryService");
        }

        return $matches['repository'];
    }
}

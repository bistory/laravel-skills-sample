<?php

use App\Models\User;
use App\Services\Repository\RepositoryService;

if (!function_exists('repositories')) {
    /**
     * @return RepositoryService
     */
    function repositories()
    {
        return resolve(RepositoryService::class);
    }
}

if (!function_exists('user')) {
    /**
     * @return User
     */
    function user(): User
    {
        return Auth::guard('api')->user();
    }
}

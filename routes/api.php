<?php

use App\Classes\Generators\MazeGenerator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', 'Auth\AuthController@login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('mazes', 'MazeController');
    Route::resource('mazes.boxes', 'BoxController');

    Route::get('generate-maze', function () {
        return (new MazeGenerator())->generate();
    });
});

<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Create player endpoint
Route::get('create/players', 'PlayerController@create_players');
Route::get('all-games', 'GameController@allGames');
Route::get('all-players', 'PlayerController@getAllPlayers');
Route::get('all-played-games', 'GameController@playedGamesPerDay');
// Route::post('range/played-games', 'GameController@rangePlayedGames');
Route::get('generate/data', 'ScriptController@create_requirements');

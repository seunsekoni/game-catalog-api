<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GamePlay;
use Faker\Generator as Faker;
use App\Game;
use App\User;

$factory->define(GamePlay::class, function (Faker $faker) {
    
    return [
        'player_id' => getRandomPlayerId(),
        'game_id' => getRandomGameId(),
        'invited_player_one' => getRandomInvitedPlayerOne() ?? NULL,
        'invited_player_two' => getRandomInvitedPlayerTwo() ?? NULL,
        'invited_player_three' => getRandomInvitedPlayerThree() ?? NULL,
        'invited_player_four' => getRandomInvitedPlayerFour() ?? NULL,
    ];
});

/**
 * This function returns a random user_id from the players table
 */
function getRandomPlayerId() {
    $users = User::pluck('id');
    return $users->random();
}

/**
 * This function returns a random game_id from the games table
 */
function getRandomGameId() {
    $games = Game::pluck('id');
    return $games->random();
}

/**
 * This function returns a random player one from the players table
 */
function getRandomInvitedPlayerOne()
{
    // Get the creator and make sure he can't join again
    $getGameCreatorId = getRandomPlayerId();
    $users = User::where('id', '!=', $getGameCreatorId)->pluck('id');
    return $users->random();
}

/**
 * This function returns a random player two from the players table
 */
function getRandomInvitedPlayerTwo()
{
    // Get the creator and make sure he can't join again
    $getGameCreatorId = getRandomPlayerId();
    $getRandomInvitedPlayerOne = getRandomInvitedPlayerOne();
    $users = User::where([
        ['id', '!=', $getGameCreatorId],
        ['id', '!=', $getRandomInvitedPlayerOne],
        ])->pluck('id');
    return $users->random();
}

/**
 * This function returns a random player three from the players table
 */
function getRandomInvitedPlayerThree()
{
    // Get the creator and make sure he can't join again
    $getGameCreatorId = getRandomPlayerId();
    $getRandomInvitedPlayerOne = getRandomInvitedPlayerOne();
    $getRandomInvitedPlayerTwo = getRandomInvitedPlayerTwo();
    $users = User::where([
        ['id', '!=', $getGameCreatorId],
        ['id', '!=', $getRandomInvitedPlayerOne],
        ['id', '!=', $getRandomInvitedPlayerTwo],
        ])->pluck('id');
    return $users->random();
}
/**
 * This function returns a random player four from the players table
 */
function getRandomInvitedPlayerFour()
{
    // Get the creator and make sure he can't join again
    $getGameCreatorId = getRandomPlayerId();
    $getRandomInvitedPlayerOne = getRandomInvitedPlayerOne();
    $getRandomInvitedPlayerTwo = getRandomInvitedPlayerTwo();
    $getRandomInvitedPlayerThree = getRandomInvitedPlayerThree();
    $users = User::where([
        ['id', '!=', $getGameCreatorId],
        ['id', '!=', $getRandomInvitedPlayerOne],
        ['id', '!=', $getRandomInvitedPlayerTwo],
        ['id', '!=', $getRandomInvitedPlayerThree],
        ])->pluck('id');
    return $users->random();
}


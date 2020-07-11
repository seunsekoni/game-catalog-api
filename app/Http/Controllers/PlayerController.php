<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Create 10,000 players randomly
     */
    public function create_players()
    {
        try {
            // Create Courses randomly
            $start_time = microtime(true); 
            $users = factory(User::class, 5)->create();
            $end_time = microtime(true); 
            $print_memory_usage = \memory_get_usage();
            $execution_time = $end_time - $start_time;

            return $this->sendResponse(NULL, 'Created players successfully', $execution_time, $print_memory_usage);
        } catch (\Throwable $th) {
            return $this->sendServerError('Failed to create Players');
        }
    }

    public function getAllPlayers()
    {
        try {
            $start_time = microtime(true); 

            $players = User::all();

            // eager load all players' games
            $allPlayers = $players->load('games');
            $end_time = microtime(true); 
            $print_memory_usage = \memory_get_usage();
            $execution_time = $end_time - $start_time;

            return $this->sendResponse($allPlayers, 'Loaded all players and games successfully', $execution_time, $print_memory_usage);

        } catch (\Throwable $th) {
            return $this->sendServerError('Failed to Load all players and games');
        }
    }
}

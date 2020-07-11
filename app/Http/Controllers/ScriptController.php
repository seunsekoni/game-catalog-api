<?php

namespace App\Http\Controllers;
use App\User;
use App\GamePlay;
use Artisan;

use Illuminate\Http\Request;

class ScriptController extends Controller
{
    /**
     * Auto generate all requirements
     */

    public function create_requirements()
    {
        try {
            $message = [];
            // get start of execution time
                $start_time = microtime(true); 

                // Create 10,0000 players
                $users = factory(User::class, 10000)->create();
                if($users) {
                    $message['users'] = 'Generated players successfully';
                } else {
                    $message['users'] = 'Unable to generate users';
                }

                
                $generate_games =  Artisan::call('db:seed');
                $message['games'] = 'Generated games successfully';
            
                // create 3,835 game plays
                $game_play = \factory(GamePlay::class, 3805)->create();
                $message['game_play'] = 'Generated GamePlays successfully';



                $end_time = microtime(true); 
                $print_memory_usage = \memory_get_usage();
                $execution_time = $end_time - $start_time;
                return $this->sendResponse(NULL, $message, $execution_time, $print_memory_usage);
        } catch (\Throwable $th) {
            return $this->sendServerError('Failed to run script');
        }

        

    }
}

<?php

namespace App\Http\Controllers;
use App\Game;
use Carbon\Carbon;
use Validator;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function allGames()
    {
        try {
            // get start of execution time
            $start_time = microtime(true); 

            // Fetch all games
            $games = Game::all();

            $end_time = microtime(true); 
            $print_memory_usage = \memory_get_usage();
            $execution_time = $end_time - $start_time;
            return $this->sendResponse($games, 'Games Fetched successfully', $execution_time, $print_memory_usage);
        } catch (\Throwable $th) {
            return $this->sendServerError('Failed to retrieve all games');
        }
    }

    public function playedGamesPerDay()
    {
        try {
           // get start of execution time
            $start_time = microtime(true); 

            // Fetch all games
            $games = Game::all();

            $allGames = $games->load('players');
            
            $end_time = microtime(true); 
            $print_memory_usage = \memory_get_usage();
            $execution_time = $end_time - $start_time;
            return $this->sendResponse($allGames, 'Loaded all games played successfully', $execution_time, $print_memory_usage);
        } catch (\Throwable $th) {
            return $this->sendServerError('Failed to retrieve all played games');
        }
    }

    public function rangePlayedGames(Request $request)
    {
        // $request = request(['start_date', 'end_date']);
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            ]);
            
            if($validator->fails()){
                return $this->validationErrorResponse($validator->errors());
            }
        // try 
            // {
                
                $date_from = Carbon::parse($request->start_date)->startOfDay();
                 $date_to = Carbon::parse($request->end_date)->endOfDay();
             $games = Game::all();
             $playedGames = $games->load(['players' => function($query) {
                $query->whereDate('created_at', '<=', $date_to)
                    ->whereDate('created_at', '>=', $date_from)
                    ->orderBy('created_at', 'DESC')
                    ;
            }]);

            dd($playedGames);
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }
    }
}

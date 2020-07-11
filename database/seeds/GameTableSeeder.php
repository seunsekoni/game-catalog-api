<?php

use Illuminate\Database\Seeder;
use App\Game;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=2010; $i <= 2020; $i++) {
            // for($j=0; $j < 1; $j++) {
                Game::insert(
                    [
                    ['name' => 'Call Of Duty', 'version' => $i, 'date_added' => NOW(),],
                    ['name' => 'Mortal Kombat', 'version' => $i, 'date_added' => NOW(),],
                    ['name' => 'FIFA', 'version' => $i, 'date_added' => NOW(),],
                    ['name' => 'Just Cause', 'version' => $i, 'date_added' => NOW(),],
                    ['name' => 'Apex Legend', 'version' => $i, 'date_added' => NOW(),],
                ]);
            // }
        }
    }
}

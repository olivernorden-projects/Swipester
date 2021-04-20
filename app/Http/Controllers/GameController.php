<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Subject;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Create list of available games
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $subject, Request $request)
    {
        return Subject::get();
    }

    /**
     * Create new game
     *
     * @param  \App\Models\Subject  $subject
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subject $subject, Request $request)
    {
        if (!$subject) {
            return response()->json(['message' => 'Subject Not Found!'], 404);
        }
        $game = $subject->games()->create();
        $game->addPlayer();
        $game->addPlayer();

        return $game->formatted();
    }

    /**
     * Get game.
     *
     * @param  string  $playerHash
     * @return \Illuminate\Http\Response
     */
    public function show($playerHash)
    {
        $player = Player::where('hash', $playerHash)->first();

        if (!$player || !$player->game) {
            return response()->json(['message' => 'Game Not Found!'], 404);
        }
        return $player->game->formatted();
    }

}

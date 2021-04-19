<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Subject;
use Illuminate\Http\Request;

class GameController extends Controller
{
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

        return $game;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\SubjectItem;

class SwipeController extends Controller
{

    /**
     * List swipes for game
     *
     * @param  String  $playerHash
     * @return \Illuminate\Http\Response
     */
    public function index($playerHash)
    {
        $player = Player::where('hash', $playerHash)->first();

        if (!$player || !$player->game) {
            return response()->json(['message' => 'Game Not Found!'], 404);
        }

        return $player->game->swipes->load('subjectItem');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  String  $playerHash
     * @param  App\Models\SubjectItem  $subjectItem
     * @param  Boolean  $approved
     * @return \Illuminate\Http\Response
     */
    public function store($playerHash, SubjectItem $subjectItem, $approved = false)
    {
        $player = Player::where('hash', $playerHash)->first();

        if (!$player || !$player->game) {
            return response()->json(['message' => 'Game Not Found!'], 404);
        }

        // Ensure that subject item exists on game
        if (!$subjectItem || !$player->game->subject->items->find($subjectItem->id)) {
            return response()->json(['message' => 'Subject Item Not Found!'], 404);
        }

        // Check if item has already been swiped by player
        if ($player->game->existingSwipe($player, $subjectItem)) {
            return response()->json(['message' => 'Item Already Swiped!'], 400);
        }

        return $player->game->swipes()->create([
            'player_id' => $player->id,
            'approved' => $approved,
            'subject_item_id' => $subjectItem->id,
        ]);
    }
}

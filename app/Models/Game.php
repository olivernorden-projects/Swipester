<?php

namespace App\Models;

use App\Models\Swipe;
use App\Models\Player;
use App\Models\Subject;
use App\Models\SubjectItem;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function players() {
        return $this->hasMany(Player::class);
    }

    public function swipes() {
        return $this->hasMany(Swipe::class);
    }

    public function existingSwipe(Player $player, SubjectItem $subjectItem) {
        return Swipe::where([
            'player_id' => $player->id,
            'game_id' => $this->id,
            'subjectItem_id' => $subjectItem->id,
        ])->first();
    }

    public function addPlayer() {
        // TODO: Handle/prevent duplicate hash
        $this->players()->create([
            'hash' => Str::random(20),
        ]);
    }

    // Return game formatted for api
    public function formatted() {
        return $this->load(['subject' => function ($query) {
            $query->with('items');
        }])->load('players');
    }
}

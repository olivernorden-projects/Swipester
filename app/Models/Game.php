<?php

namespace App\Models;

use App\Models\Swipe;
use App\Models\Player;
use App\Models\Subject;
use App\Models\SubjectItem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $appends = [
        'matches'
    ];

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
            'subject_item_id' => $subjectItem->id,
        ])->first();
    }

    public function getMatchesAttribute() {
        return $this->subject->items->whereIn('id', $this->subjectItemMatchesIds())->values();
    }

    // Get subject item ids of game matches
    public function subjectItemMatchesIds() {
        return DB::table('swipes')
            ->select(DB::raw('COUNT(id) as count'), 'subject_item_id')
            ->groupBy('subject_item_id')
            ->where('game_id', $this->id)
            ->where('approved', true)
            ->havingRaw('count = 2')
            ->get()
            ->pluck('subject_item_id');
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

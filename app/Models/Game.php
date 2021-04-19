<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Subject;
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

    public function addPlayer() {
        // TODO: Handle/prevent duplicate hash
        $this->players()->create([
            'hash' => Str::random(20),
        ]);
    }
}

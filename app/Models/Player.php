<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Swipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function swipes() {
        return $this->hasMany(Swipe::class);
    }
}

<?php

namespace App\Models;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'approved',
        'subjectItem_id',
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }
}

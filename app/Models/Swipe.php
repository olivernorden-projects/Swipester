<?php

namespace App\Models;

use App\Models\Game;
use App\Models\SubjectItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'approved',
        'subject_item_id',
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function subjectItem() {
        return $this->belongsTo(SubjectItem::class);
    }
}

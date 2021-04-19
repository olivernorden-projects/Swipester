<?php

namespace App\Models;

use App\Models\SubjectItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    public function items() {
        return $this->hasMany(SubjectItem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public function lawyersPositions()
    {
        return $this->belongsToMany(Lawyer::class, 'lawyers_positions');
    }
}

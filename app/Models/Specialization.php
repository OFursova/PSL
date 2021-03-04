<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    public function lawyersSpec()
    {
        return $this->belongsToMany(Lawyer::class, 'lawyers_specializations');
    }

    public function casesSpec()
    {
        return $this->belongsToMany(LegalCase::class, 'cases_specializations');
    }
}

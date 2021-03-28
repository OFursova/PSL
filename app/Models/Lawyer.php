<?php

namespace App\Models;

use App\Scopes\LawyerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends User
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new LawyerScope);
    }

    public function specs()
    {
        return $this->morphToMany(Spec::class, 'specable');
    }

    public function role()
    {
        return 'Lawyer';
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function cases()
    {
        return $this->morphToMany(LegalCase::class, 'caseable');
    }
}

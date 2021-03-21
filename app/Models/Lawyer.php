<?php

namespace App\Models;

use App\Scopes\LawyerScope;
use App\Traits\Attachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends User
{
    use Attachable, HasFactory;

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
}

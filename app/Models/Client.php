<?php

namespace App\Models;

use App\Scopes\ClientScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends User
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ClientScope);
    }

    public function cases()
    {
        return $this->morphToMany(LegalCase::class, 'caseable');
    }

}

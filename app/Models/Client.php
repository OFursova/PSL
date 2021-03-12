<?php

namespace App\Models;

use App\Scopes\ClientScope;
use App\Traits\AttachCases;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Client extends User
{
    use AttachCases, HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ClientScope);
    }

}

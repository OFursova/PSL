<?php

namespace App\Models;

use App\Scopes\LawyerScope;
use App\Traits\AttachCases;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends User
{
    use AttachCases, HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new LawyerScope);
    }
}

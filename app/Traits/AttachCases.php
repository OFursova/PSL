<?php

namespace App\Traits;

use App\Models\LegalCase;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


trait AttachCases
{
    public function attachments()
    {
        return $this->morphToMany(LegalCase::class, 'attachable', 'cases_attachments');
    }
}

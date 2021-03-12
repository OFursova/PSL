<?php

namespace App\Traits;

use App\Models\LegalCase;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


trait Attachable
{
    public function cases()
    {
        return $this->morphToMany(LegalCase::class, 'attachable', 'cases_attachments');
    }

    public function specializations()
    {
        return $this->morphToMany(Specialization::class, 'attachable', 'specializations_attachments');
    }
}

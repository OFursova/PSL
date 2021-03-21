<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecializationsAttachment extends Model
{
    protected $table = 'specializations_attachments';
    protected $fillable = ['specialization_id', 'attachable_id', 'attachable_type'];

    public function related()
    {
        return $this->morphTo();
    }
}

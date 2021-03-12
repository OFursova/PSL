<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'start', 'end', 'result'];

    public function lawyers()
    {
        return $this->morphedByMany(Lawyer::class, 'attachable', 'specializations_attachments');
    }
    public function cases()
    {
        return $this->morphedByMany(LegalCase::class, 'attachable', 'specializations_attachments');
    }
    public function attachments()
    {
        return $this->hasMany(SpecializationsAttachment::class);
    }

    // public function lawyersSpec()
    // {
    //     return $this->belongsToMany(Lawyer::class, 'lawyers_specializations');

    // }

    // public function casesSpec()
    // {
    //     return $this->belongsToMany(LegalCase::class, 'cases_specializations');
    // }
}

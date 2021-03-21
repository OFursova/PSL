<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    protected $table = 'specializations';

    public function lawyers()
    {
        return $this->morphedByMany(Lawyer::class, 'specable');
    }
    public function cases()
    {
        return $this->morphedByMany(LegalCase::class, 'specable');
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

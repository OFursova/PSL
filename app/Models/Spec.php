<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    protected $table = 'specializations';
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->slug = request()->filled('slug') ? request()->slug : Str::slug(request()->name, '-');
        });
    }

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

}

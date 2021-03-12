<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'start', 'end', 'result'];

    public function lawyers()
    {
        return $this->morphedByMany(Lawyer::class, 'attachable', 'cases_attachments');
    }
    public function clients()
    {
        return $this->morphedByMany(Client::class, 'attachable', 'cases_attachments');
    }
    /*
     * morph attachment to lawyers and clients
     */
    public function attachments()
    {
        return $this->hasMany(CasesAttachment::class);
    }
}

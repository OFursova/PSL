<?php

namespace App\Models;

use App\Scopes\LawyerScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends User
{
    use HasFactory;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new LawyerScope);
    }

    public function specs()
    {
        return $this->morphToMany(Spec::class, 'specable');
    }

    public function role()
    {
        return 'Lawyer';
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function cases()
    {
        return $this->morphToMany(LegalCase::class, 'caseable');
    }

    public function scopeFiltered(Builder $query) {
        return $query->select(['users.*'])
            ->when(request('name'), function (Builder $query, $name) {
                return $query->where('name', 'LIKE', "%{$name}%");
            })
            ->when(request('spec'), function (Builder $query, $spec) {
                return $query->whereHas('specs', function (Builder $query) use ($spec) {
                    $query->where('name', 'LIKE', "%{$spec}%");
                });
            })
            ->when(request('case'), function (Builder $query, $case) {
                return $query->whereHas('cases', function (Builder $query) use ($case) {
                    $query->where('name', 'LIKE', "%{$case}%");
                });
            })
            ->when(request('position'), function (Builder $query, $position) {
                return $query->whereHas('position', function (Builder $query) use ($position) {
                    $query->where('name', 'LIKE', "%{$position}%");
                });
            });
    }
}

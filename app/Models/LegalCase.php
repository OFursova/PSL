<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use Sluggable, HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'start', 'end', 'result', 'attachment'];

    public function clients()
    {
        return $this->morphedByMany(Client::class, 'caseable');
    }

    public function lawyers()
    {
        return $this->morphedByMany(Lawyer::class, 'caseable');
    }
 
    public function specs()
    {
        return $this->morphToMany(Spec::class, 'specable');
    }

    public function test_case()
    {
        $case = LegalCase::factory()->make();
    }
    
    public function scopeFiltered(Builder $query) {
        return $query->select(['legal_cases.*'])
            ->when(request('spec'), function (Builder $query, $spec) {
                return $query->whereHas('specs', function (Builder $query) use ($spec) {
                    $query->where('name', 'LIKE', "%{$spec}%");
                });
            })
            ->when(request('lawyer'), function (Builder $query, $lawyer) {
                return $query->whereHas('lawyers', function (Builder $query) use ($lawyer) {
                    $query->where('name', 'LIKE', "%{$lawyer}%");
                });
            })
            ->when(request('client'), function (Builder $query, $client) {
                return $query->whereHas('clients', function (Builder $query) use ($client) {
                    $query->where('name', 'LIKE', "%{$client}%");
                });
            })
            ->when(request('result'), function (Builder $query, $result) {
                $result == 'won' ? $result = 1 : ($result == 'lost' ? $result = 0 : $result = '');
                return $query->where('result', $result);
            });
    }
}

<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use Sluggable, HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'start', 'end', 'result'];

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
    
}

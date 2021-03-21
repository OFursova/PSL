<?php
namespace App\Traits;
use Illuminate\Support\Str;

trait Sluggable
{
    public function setSlugAttribute($value)
    {
      $this->attributes['slug'] = $value ? Str::slug($value, '-') : Str::slug($this->attributes['name'], '-');
    }
}

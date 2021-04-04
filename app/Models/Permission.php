<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->slug = request()->filled('slug') ? request()->slug : Str::slug(request()->name, '-');
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

}

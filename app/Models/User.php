<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    public function hasRole($role)
    {
        return $this->roles->contains('slug', $role);
    }
    public function hasPermission($permission)
    {
        return $this->permissions->contains('slug', $permission);
    }
    public function cases()
    {
        return $this->belongsToMany(LegalCase::class, 'users_cases');
    }
    public function specialization()
    {
        if ($this->roles->contains('slug', 'lawyer')) {
            return $this->belongsToMany(Specialization::class, 'lawyers_specializations');
        }
    }

    public function getImgAttribute($value)
    {
       return $value ? $value : '/images/no_image.jpg';
    }
}

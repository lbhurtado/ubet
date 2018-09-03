<?php

namespace App;

use App\Permissions\HasPermissionsTrait;
use App\Traits\Eloquent\GeneratesIdentifier;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait, GeneratesIdentifier;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getIdentifierAttribute()
    {
        return $this->generateIdentifier($this->id);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'identifier', 'identifier');
    }

    public function messengers()
    {
        return $this->hasMany(Messenger::class, 'identifier', 'identifier');
    }
}

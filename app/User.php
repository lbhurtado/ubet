<?php

namespace App;

use App\Traits\Eloquent\HasPhone;
use App\Permissions\HasPermissions;
use App\Traits\Eloquent\Anonymized;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable, Anonymized, HasPermissions, HasPhone;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $table = 'users';


    public function addresses()
    {
        return $this->hasMany(Address::class, 'identifier', 'identifier');
    }

    public function messengers()
    {
        return $this->hasMany(Messenger::class, 'identifier', 'identifier');
    }

    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class, 'identifier', 'identifier');
    }
}

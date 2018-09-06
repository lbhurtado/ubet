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

    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class, 'identifier', 'identifier');
    }

    public function hasTwoFactorAuthenticationEnabled()
    {
        return $this->two_factor_type !== 'off';
    }

    public function hasSmsTwoFactorAuthenticationEnabled()
    {
        return $this->two_factor_type === 'sms';
    }

    public function hasTwoFactorType($type)
    {
        return $this->two_factor_type === $type;
    }

    public function hasDiallingCode($diallingCodeId)
    {
        if ($this->hasPhoneNumber() === false) {
            return false;
        }

        return $this->phoneNumber->diallingCode->id === $diallingCodeId;
    }

    public function getPhoneNumber()
    {
        if ($this->hasPhoneNumber() === false) {
            return false;
        }

        return $this->phoneNumber->phone_number;
    }

    public function hasPhoneNumber()
    {
        return $this->phoneNumber !== null;
    }

    public function registeredForTwoFactorAuthentication()
    {
        return $this->authy_id !== null;
    }

    public function updatePhoneNumber($phoneNumber, $phoneNumberDiallingCode)
    {
        $this->phoneNumber()->delete();

        if (!$phoneNumber) {
            return;
        }

        return $this->phoneNumber()->create([
            'phone_number' => $phoneNumber,
            'dialling_code_id' => $phoneNumberDiallingCode,
        ]);
    }

}

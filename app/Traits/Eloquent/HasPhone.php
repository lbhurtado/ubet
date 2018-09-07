<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 06/09/2018
 * Time: 7:21 PM
 */

namespace App\Traits\Eloquent;


use App\Repositories\Contracts\UserRepository;
use Illuminate\Database\Eloquent\Builder;

trait HasPhone
{
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
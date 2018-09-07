<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 03/09/2018
 * Time: 10:25 PM
 */

namespace App\Services\Authy;


use App\User;
use Authy\AuthyApi;
use Authy\AuthyFormatException;
use App\Services\Authy\Exceptions\InvalidTokenException;
use App\Services\Authy\Exceptions\SmsRequestFailedException;
use App\Services\Authy\Exceptions\RegistrationFailedException;

class AuthyService
{
    private $client;

    public function __construct(AuthyApi $client)
    {
        $this->client = $client;
    }

    public function registerUser(User $user)
    {
        $user = $this->client->registerUser(
            $user->email,
            $user->phoneNumber->phone_number,
            $user->phoneNumber->diallingCode->dialling_code
        );

        if (!$user->ok()) {
            throw new RegistrationFailedException;
        }

        return $user->id();
    }


    public function verifyToken($token, User $user = null)
    {
        try {
            $verification = $this->client
                ->verifyToken($user ? $user->authy_id : request()->session()->get('authy.authy_id'), $token);
        } catch (AuthyFormatException $e) {
            throw new InvalidTokenException;
        }

        if (!$verification->ok()) {
            throw new InvalidTokenException;
        }

        return true;
    }

    public function requestSMS(User $user)
    {
        $request = $this->client->requestSms($user->authy_id, [
            'force' => true,
        ]);

        if (!$request->ok()) {
            throw new SmsRequestFailedException;
        }
    }
}
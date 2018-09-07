<?php

namespace App\Http\Controllers;

use App\Facades\Authy;
use Illuminate\Http\Request;
use App\Http\Requests\TwoFactorSettingsRequest;
use App\Repositories\Contracts\DiallingCodeRepository;
use App\Services\Authy\Exceptions\RegistrationFailedException;

class TwoFactorSettingsController extends Controller
{
    public function index(DiallingCodeRepository $dialling_codes)
    {
        return view('settings.two_factor')->with([
            'diallingCodes' => $dialling_codes->all(),
        ]);
    }

    public function update(TwoFactorSettingsRequest $request)
    {
        $user = $request->user();

        $user->updatePhoneNumber($request->phone_number, $request->phone_number_dialling_code);

        if (!$user->registeredForTwoFactorAuthentication()) {
            try {
                $authyId = Authy::registerUser($user);
                $user->authy_id = $authyId;
            } catch (RegistrationFailedException $e) {
                return redirect()->back();
            }
        }
        $user->two_factor_type = $request->two_factor_type;

        $user->save();

        return redirect()->back();
    }
}

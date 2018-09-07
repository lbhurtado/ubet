<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TwoFactorSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'two_factor_type' => 'required|in:' . $this->getFormattedTwoFactorTypes(),
            'phone_number' => 'required_unless:two_factor_type,off',
            'phone_number_dialling_code' => 'required_unless:two_factor_type,off|exists:dialling_codes,id',
        ];
    }

    protected function getFormattedTwoFactorTypes()
    {
        return implode(',', $this->getTwoFactorTypes());
    }

    protected function getTwoFactorTypes()
    {
        return array_keys(config('two_factor.types'));
    }
}

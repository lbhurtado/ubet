@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two factor settings</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('settings.twofactor.update') }}">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <label for="two_factor_type" class="col-sm-4 col-form-label text-md-right">{{ __('Two Factor Type') }}</label>

                                <div class="col-md-6">
                                    <select name="two_factor_type" id="two_factor_type" class="form-control">
                                        @foreach (config('twofactor.types') as $key => $name)
                                            <option value="{{ $key }}"{{ old('two_factor_type') === $key || Auth::user()->hasTwoFactorType($key) ? 'selected="selected"' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('two_factor_type'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('two_factor_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number_dialling_code" class="col-md-4 col-form-label text-md-right">{{ __('Dialling Code') }}</label>

                                <div class="col-md-6">
                                    <select name="phone_number_dialling_code" id="phone_number_dialling_code" class="form-control">
                                        <option value="">Select a dialling code</option>
                                        @foreach ($diallingCodes as $code)
                                            <option value="{{ $code->id }}"{{ old('phone_number_dialling_code') == $code->id || Auth::user()->hasDiallingCode($code->id) ? ' selected="selected"' : '' }}>{{ $code->name }} (+{{ $code->dialling_code }})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('phone_number_dialling_code'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('phone_number_dialling_code') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : Auth::user()->getPhoneNumber() }}">
                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.layout')
@section('content')
    <div class="reset">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="reset-password d-flex flex-column justify-content-center align-items-center">
                        <span class="title-reset">Reset Password</span>
                        <form method="POST" action="{{ route('reset.password.post') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-6 col-form-label text-md-left">{{ __('Confirm Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            @if (session('message_reset'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message_reset') }}
                                </div>
                            @endif
                            @if (session()->has('error_reset'))
                                <div class="alert alert-danger" id="error_reset">
                                    {{ session()->get('error_reset') }}
                                </div>
                            @endif
                            <div class="form-group row mb-0 justify-content-center">
                                <div class="col-md-8">
                                    <button type="submit" class="btn-reset">
                                        reset password
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

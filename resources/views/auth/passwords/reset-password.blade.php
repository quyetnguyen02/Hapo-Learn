@extends('layouts.layout')
@section('content')
    <div class="reset">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="reset-password d-flex flex-column justify-content-center align-items-center">
                        <span class="title-reset">Reset Password</span>
                        <span class="content-reset">Enter email to reset your password</span>
                        <form method="POST" action="{{ route('forget.password.post') }}">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-md-left">Email:</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
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

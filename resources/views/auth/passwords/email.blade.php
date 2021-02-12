@extends('layouts.sign')

@section('content')
    <div class="card">
        <div class="card-header border-bottom text-center">
            <h4 class="card-title">{{ __('Reset Password') }}</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="form-horizontal m-t-20">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group text-center m-t-20">
                <button class="btn btn-common btn-block" type="submit">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
                <div class="form-group m-t-10 mb-0">
                    <div class="text-center">
                        <a href="/login" class="text-muted">Already have account?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

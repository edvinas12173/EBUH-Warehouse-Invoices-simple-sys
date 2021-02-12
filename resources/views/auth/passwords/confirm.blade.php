@extends('layouts.sign')

@section('content')
    <div class="card">
        <div class="card-header border-bottom text-center">
            <h4 class="card-title">{{ __('Confirm Password') }}</h4>
        </div>
        <div class="card-body">
            {{ __('Please confirm your password before continuing.') }}
            <form method="POST" action="{{ route('password.confirm') }}" class="form-horizontal m-t-20">
                @csrf
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group text-center m-t-20">
                    <button class="btn btn-common btn-block" type="submit">
                        {{ __('Confirm Password') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
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

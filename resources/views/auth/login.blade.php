@extends('layouts.sign')

@section('content')
    <div class="card">
        <div class="card-header border-bottom text-center">
            <h4 class="card-title">Sign In</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="form-horizontal m-t-20">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <button class="btn btn-common btn-block" type="submit">{{ __('Login') }}</button>
                </div>
                <div class="form-group">
                    <div class="float-right">
                        <a href="/password/reset" class="text-muted"><i class="lni-lock"></i> Forgot your password?</a>
                    </div>
                    <div class="float-left">
                        <a href="/register" class="text-muted"><i class="lni-user"></i> Create an account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Change password</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('changepassword', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password">
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Change password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

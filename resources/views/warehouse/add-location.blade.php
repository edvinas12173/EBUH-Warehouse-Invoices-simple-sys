@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add location</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('addlocation') }}" class="form-horizontal m-t-20">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="Location name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Add location
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

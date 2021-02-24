@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add category</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('addcategory') }}" class="form-horizontal m-t-20">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="Category name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Add category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('editcompany', $company->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $company->name }}" required autocomplete="name" autofocus placeholder="Company name">
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $company->email }}" required autocomplete="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input id="phone" type="number" class="form-control" name="phone" value="{{ $company->phone }}" required autocomplete="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <input id="website" type="text" class="form-control" name="website" value="{{ $company->website }}">
                    </div>
                    <div class="form-group">
                        <input id="country" type="text" class="form-control" name="country" value="{{ $company->country }}">
                    </div>
                    <div class="form-group">
                        <input id="city" type="text" class="form-control" name="city" value="{{ $company->city }}">
                    </div>
                    <div class="form-group">
                        <input id="address" type="text" class="form-control" name="address" value="{{ $company->address }}">
                    </div>
                    <div class="form-group">
                        <input id="zip_code" type="text" class="form-control" name="zip_code" value="{{ $company->zip_code }}">
                    </div>
                    <div class="form-group">
                        <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ $company->bank_name }}">
                    </div>
                    <div class="form-group">
                        <input id="bank_account" type="text" class="form-control" name="bank_account" value="{{ $company->bank_account }}">
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('editprofile', $employee->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" value="{{ $employee->name }}">
                    </div>
                    <div class="form-group">
                        <input name="lastname" type="text" class="form-control" value="{{ $employee->lastname }}">
                    </div>
                    <div class="form-group">
                        <select name="gender" type="text" class="form-control">
                            <option selected value="{{ $employee->gender }}">{{ $employee->gender }}</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input disabled name="email" type="email" class="form-control" value="{{ $employee->email }}">
                    </div>
                    <div class="form-group">
                        <input name="phone" type="number" class="form-control" value="{{ $employee->phone }}">
                    </div>
                    <div class="form-group">
                        <input name="birthday" id="datepicker" type="text" class="form-control"  value="{{ $employee->birthday }}">
                    </div>
                    <div class="form-group">
                        <input name="image" type="file" class="form-control" value="{{ $employee->image }}">
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

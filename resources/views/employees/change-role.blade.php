@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Change role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('changerole', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <select id="role" name="role" type="text" class="form-control" placeholder="Role">
                            <option selected value="{{ $employee->role }}">{{ $employee->role }}</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Accountant">Accountant</option>
                        </select>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Change role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

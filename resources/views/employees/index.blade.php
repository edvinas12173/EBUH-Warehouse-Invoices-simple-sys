@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Employees</h4>
                @if(Auth::user()->role == "Admin")
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a href="/employees/addemployee">
                                    <button class="btn btn-common btn-rounded"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                <table class="table table-lg">
                    <thead>
                        <tr class="table-text">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <div class="list-media">
                                        <div class="list-item">
                                            <div class="media-img">
                                                <img src="{{ $employee->image }}" alt="">
                                            </div>
                                            <div class="info">
                                                <span class="title text-semibold">{{ $employee->name }} {{ $employee->lastname }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->birthday }} , {{ \Carbon\Carbon::parse($employee->birthday)->age }} year</td>
                                <td>
                                    @if ($employee->role == "Admin")
                                        <span class="badge badge-primary">{{ $employee->role }}</span>
                                    @elseif ($employee->role == "Accountant")
                                        <span class="badge badge-success">{{ $employee->role }}</span>
                                    @else
                                        <span class="badge badge-dark">{{ $employee->role }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/employees/profile/{{ $employee->id }}"><button class="btn btn-dark btn-rounded">Visit profile</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div class="custom-pagination">
                    {{ $employees->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New employee"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                @if($employees->count() == 0)
                    <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> The list of employees is empty.
                        </div>
                    </div>
                @else
                    <table class="table table-lg">
                        <thead>
                            <tr class="table-text">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Status</th>
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
                                    <td>
                                        @if ($employee->role == "Admin")
                                            <span class="badge badge-primary">{{ $employee->role }}</span>
                                        @elseif ($employee->role == "Accountant")
                                            <span class="badge badge-success">{{ $employee->role }}</span>
                                        @elseif ($employee->role == "Manager")
                                            <span class="badge badge-warning">{{ $employee->role }}</span>
                                        @else
                                            <span class="badge badge-dark">{{ $employee->role }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Cache::has('userOnline' . $employee->id))
                                            <span class="badge badge-light">
                                                <li class="text-success">
                                                    Online
                                                </li>
                                            </span>
                                        @else
                                            <span class="badge badge-light">
                                                <li class="text-danger">
                                                    Offline
                                                </li>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/employees/profile/{{ $employee->id }}"><button class="btn btn-dark btn-rounded">Visit profile</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div>
                <div class="custom-pagination">
                    {{ $employees->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

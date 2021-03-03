@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="media align-items-center py-3 mb-3">
                <img src="{{ $employee->image }}" class="rounded-circle profile-img-size" alt="...">
                <div class="ml-4">
                    <h4 class="font-weight-bold mb-0">{{ $employee->name }} {{ $employee->lastname }}</h4>
                    <div class="text-muted mb-2">ID: {{ $employee->id }}</div>
                    @if(Auth::user()->role == "Admin" or $employee->id == Auth::user()->id)
                        <a href="/employees/profile/{{ $employee->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <a href="/employees/profile/{{ $employee->id }}/change-password" class="btn btn-dark btn-sm">Change password</a>
                    @endif
                    @if(Auth::user()->role == "Admin")
                        <a href="/employees/profile/{{ $employee->id }}/change-role" class="btn btn-dark btn-sm">Change role</a>
                        <form action="{{ route('destroyemployeee', $employee->id) }}" method="POST" class="form-display">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="table-overflow">
                <table class="table user-view-table m-0">
                <tbody>
                    <tr>
                        <td>First Name:</td>
                        <td>{{ $employee->name }}</td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td>{{ $employee->lastname }}</td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>{{ $employee->gender }}</td>
                    </tr>
                    <tr>
                        <td>Birthday:</td>
                        <td>{{ $employee->birthday }} , {{ \Carbon\Carbon::parse($employee->birthday)->age }} year</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                    <tr>
                        <td>Role:</td>
                        @if ($employee->role == "Admin")
                            <td class="text-primary">{{ $employee->role }}</td>
                        @elseif ($employee->role == "Accountant")
                            <td class="text-success">{{ $employee->role }}</td>
                        @elseif ($employee->role == "Manager")
                            <td class="text-warning">{{ $employee->role }}</td>
                        @else
                            <td class="text-dark">{{ $employee->role }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Status:</td>
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
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

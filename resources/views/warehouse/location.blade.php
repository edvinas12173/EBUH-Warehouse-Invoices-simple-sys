@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Location</h4>
                @if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper")
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a href="/warehouse/location/addlocation">
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New location"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                @if($location->count() == 0)
                    <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> The list of locations is empty.
                        </div>
                    </div>
                @else
                    <table class="table table-lg">
                        <thead>
                        <tr class="table-text">
                            <th>Location ID</th>
                            <th>Location name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($location as $loc)
                            <tr>
                                <td>#{{ $loc->id }}</td>
                                <td>{{ $loc->name }}</td>
                                <td>
                                    @if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper")
                                        <a href="/warehouse/location/{{$loc->id}}/edit"><button class="btn btn-dark btn-rounded">Edit</button></a>
                                        <form action="{{ route('destroylocation', $loc->id) }}" method="POST" class="form-display">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-rounded">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div>
                <div class="custom-pagination">
                    {{ $location->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

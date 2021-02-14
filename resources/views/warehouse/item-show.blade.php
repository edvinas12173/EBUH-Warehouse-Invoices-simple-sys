@extends('layouts.main')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="media align-items-center py-3 mb-3">
                <div>
                    @if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper")
                        <a href="/warehouse/items/{{ $item->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                    @endif
                    @if(Auth::user()->role == "Admin")
                        <form action="{{ route('destroyitem', $item->id) }}" method="POST" class="form-display">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
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
                            <td>ID: <b>{{ $item -> id }}</b></td>
                            <td>Item name: <b>{{ $item -> item_name }}</b></td>
                            <td>Category: <b>{{ $item -> category }}</b></td>
                            <td>Stock: <b>{{ $item -> stock }}</b></td>
                            <td>Price: <b>{{ $item -> price }}</b></td>
                            <td>Price: <b>{{ $item -> location }}</b></td>
                        </tr>
                        <tr>
                            <td>Description:</td>
                            <td colspan="5"><b>{{ $item-> item_desc }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category</h4>
                @if(Auth::user()->role == "Admin" or Auth::user()->role == "Manager")
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a href="/warehouse/category/addcategory">
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New category"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                @if($category->count() == 0)
                    <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> The list of items is empty.
                        </div>
                    </div>
                @else
                    <table class="table table-lg">
                        <thead>
                            <tr class="table-text">
                                <th>Category ID</th>
                                <th>Category name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($category as $category)
                                <tr>
                                    <td>#{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="/warehouse/category/{{$category->id}}/edit"><button class="btn btn-dark btn-rounded">Edit</button></a>
                                        <form action="{{ route('destroycategory', $category->id) }}" method="POST" class="form-display">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                             @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div>
                <div class="custom-pagination">

                </div>
            </div>
        </div>
    </div>
@endsection

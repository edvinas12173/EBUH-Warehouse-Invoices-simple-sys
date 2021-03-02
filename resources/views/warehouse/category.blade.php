@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category</h4>
                @if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper")
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
                            <strong>Warning!</strong> The list of categorys is empty.
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
                             @foreach($category as $cate)
                                <tr>
                                    <td>#{{ $cate->id }}</td>
                                    <td>{{ $cate->name }}</td>
                                    <td>
                                        @if(Auth::user()->role == "Admin" or Auth::user()->role == "Storekeeper")
                                            <a href="/warehouse/category/{{$cate->id}}/edit"><button class="btn btn-dark btn-rounded">Edit</button></a>
                                            <form action="{{ route('destroycategory', $cate->id) }}" method="POST" class="form-display">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded" onclick="return confirm('Are you sure?')">
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
                    {{ $category->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

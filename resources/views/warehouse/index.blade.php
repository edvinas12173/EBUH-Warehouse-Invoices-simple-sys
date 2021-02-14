@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-common btn-rounded col-12 table-text">Loads list</button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-common btn-rounded col-12 table-text">Shipments</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Warehouse</h4>
                @if(Auth::user()->role == "Admin" or Auth::user()->role == "Manager")
                    <div class="card-toolbar">
                        <ul>
                            <li>
                                <a href="/warehouse/location">
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New location"><i class="fas fa-map-marker-alt"></i></button>
                                </a>
                            </li>
                            <li>
                                <a href="/warehouse/category">
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New category"><i class="fas fa-list"></i></button>
                                </a>
                            </li>
                            <li>
                                <a href="/warehouse/items/additem">
                                    <button class="btn btn-common btn-rounded" data-toggle="tooltip" data-placement="bottom" data-original-title="New item"><i class="fas fa-plus"></i></button>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="table-overflow">
                @if($items->count() == 0)
                    <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> The list of items is empty.
                        </div>
                    </div>
                @else
                    <table class="table table-lg">
                        <thead>
                            <tr class="table-text">
                                <th>Item ID</th>
                                <th>Item name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Location</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                <td>#{{ $item->id }}</td>
                                <td>{{ $item->item_name }}</td>
                                <td class="warehouse-item-desc-overflow">{{ $item->item_desc }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->price }}€</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    <a href="/warehouse/items/{{ $item->id }}"><button class="btn btn-dark btn-rounded">More</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <div>
                <div class="custom-pagination">
                    {{ $items->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

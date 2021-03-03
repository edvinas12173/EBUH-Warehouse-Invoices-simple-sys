@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Add item</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('additem') }}" class="form-horizontal m-t-20">
                    @csrf
                    <div class="form-group">
                        <input id="item_name" type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" required autocomplete="item_name" autofocus placeholder="Item name">
                        @error('item_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea rows="3" id="item_desc" type="textarea" class="form-control @error('item_desc') is-invalid @enderror" name="item_desc" required autocomplete="item_desc" placeholder="Description"></textarea>
                        @error('item_desc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" required autocomplete="category" placeholder="Category">
                            <option value="#" selected disabled>Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock"  required autocomplete="stock" placeholder="Stock">
                        @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price" placeholder="Price €">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location" placeholder="Location">
                            <option value="#" selected disabled>Select location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Add item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

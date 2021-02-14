@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('edititem', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="item_name" type="text" class="form-control" name="item_name" required value="{{ $item->item_name }}">
                    </div>
                    <div class="form-group">
                        <textarea rows="3" id="item_desc" type="textarea" class="form-control" name="item_desc" required>{{ $item->item_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <input id="category" type="text" class="form-control" name="category"  required value="{{ $item->category }}">
                    </div>
                    <div class="form-group">
                        <input id="stock" type="text" class="form-control" name="stock"  required value="{{ $item->stock }}">
                    </div>
                    <div class="form-group">
                        <input id="price" type="text" class="form-control" name="price" required value="{{ $item->price }}">
                    </div>
                    <div class="form-group">
                        <input id="location" type="text" class="form-control" name="location" required value="{{ $item->location }}">
                    </div>
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-common btn-block" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

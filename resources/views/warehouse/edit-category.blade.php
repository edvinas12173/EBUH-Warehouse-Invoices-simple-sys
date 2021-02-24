@extends('layouts.main')

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('editcategory', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" required value="{{ $category->name }}">
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

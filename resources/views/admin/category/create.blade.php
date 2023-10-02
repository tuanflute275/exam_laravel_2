@extends('layouts.admin')

@section('title', 'Category')

@section('main')
    <div class="container">
        <h2 class="text-center my-3">Add New Category</h2>
        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control"
                            placeholder="Enter your name...">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Product')

@section('main')
    <div class="container">
        <h2 class="text-center my-3">Add New Product</h2>
        <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="" class="form-control">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" id="" class="form-control"
                            placeholder="Enter your price...">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Sale Price</label>
                        <input type="text" name="sale_price" id="" class="form-control"
                            placeholder="Enter your sale_price...">
                        @error('sale_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id" id="">
                            <option value="none">--choose--</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                        @error('description')
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

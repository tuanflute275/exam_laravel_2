@extends('layouts.customer')

@section('title', 'Checkout Page')

@section('main')
    <h2 class="text-center">Chekout</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('checkout') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control"
                            placeholder="Enter your name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control"
                            placeholder="Enter your email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="" class="form-control"
                            placeholder="Enter your phone">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" id="" class="form-control"
                            placeholder="Enter your address">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pro_checkout as $item)
                            <tr>
                                <td scope="row">{{ $item['product_id'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td><img src="{{ url('') }}/uploads/products/{{ $item['image'] }}" width="60px" alt=""></td>
                                <td>${{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

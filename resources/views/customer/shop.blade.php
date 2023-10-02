@extends('layouts.customer')

@section('title', 'Shop Page')

@section('main')
    <div class="container">
        <h2 class="text-center">shop</h2>
        <form method="get">
            <div class="d-flex my-3">
                <div class="w-25 mr-3">
                    <input type="text" class="form-control" name="search" placeholder="Search..." id="">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

            <div class="form-group">
                <label for="">Sort By: </label>
                <div class="d-flex">
                    <div class="w-25 mr-3">
                        <select class="form-control" name="order" id="">
                            <option value="name-ASC">Name: A - Z</option>
                            <option value="name-DESC">Name: Z - A</option>
                            <option value="price-ASC">Price: A - Z</option>
                            <option value="price-DESC">Price: Z - A</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card">
                        <a href="{{ route('detail', $item->id) }}">
                            <img class="card-img-top" src="{{ url('') }}/uploads/products/{{ $item->image }}"
                                alt=""></a>
                        <div class="card-body">
                            <a href="{{ route('detail', $item->id) }}">
                                <h4 class="card-title">{{ $item->name }}</h4>
                            </a>
                            <p class="card-text">${{ number_format($item->price) }}</p>
                            @if ($item->sale_price > 0)
                                <p class="card-text">${{ number_format($item->sale_price) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
@endsection

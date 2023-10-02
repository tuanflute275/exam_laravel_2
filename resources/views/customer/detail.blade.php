@extends('layouts.customer')

@section('title', 'Detail Page')

@section('main')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ url('') }}/uploads/products/{{ $pro->image }}" width="100%" alt="">
            </div>
            <div class="col-md-6">
                <small>ID : {{ $pro->id }}</small>
                <p><b>Name: </b> {{ $pro->name }}</p>
                <p><b>Price: </b>$ {{ number_format($pro->price) }}</p>
                @if ($pro->sale_price > 0)
                    <p><b>Sale Price: </b>$ {{ number_format($pro->sale_price) }}</p>
                @endif
                {{-- <p><b>Category: </b> {{ $pro->category->name }}</p> --}}
                <p><b>Description: </b> {{ $pro->description }}</p>
                {{-- <form action="" method="post">
                    @csrf
                    <div class="d-flex">
                        <div class="w-25">
                            <input class="form-control" type="number" value="1" min="1" name=""
                                id="">
                        </div>
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </div>
                </form> --}}
                <form action="{{ route('shop.cart', $pro->id) }}" method="post">
                    @csrf
                    <div class="quick-product-action">
                        <div class="action-top">
                            <div class="d-flex">
                                <div class="w-25">
                                    <input type="number" class="form-control" name="quantity" title="Quantity"
                                        value="1" />
                                </div>
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

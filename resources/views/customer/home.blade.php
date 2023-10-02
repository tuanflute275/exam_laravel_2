@extends('layouts.customer')

@section('title', 'Home Page')

@section('main')
    <div class="container">
        <h2 class="text-center my-5">New Products</h2>
        <div class="row">
            @forelse ($new_products as $item)
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
            @empty
                <p>No Data</p>
            @endforelse
        </div>
    </div>
    <div class="container">
        <h2 class="text-center my-5">Sale Products</h2>
        <div class="row">
            @forelse ($sale_products as $item)
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
            @empty
                <p>No Data</p>
            @endforelse
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Product')

@section('main')
    <div class="container">
        <h2 class="text-center my-4"></h2>
        <a name="" id="" class="btn btn-primary" href="{{ route('admin.product.create') }}" role="button">+Add
            New</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img src="{{ url('') }}/uploads/products/{{ $item->image }}" width="60px"
                                alt=""></td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->sale_price }}</td>
                        <td>
                            <form action="{{ route('admin.product.destroy', $item->id) }}" method="post">
                                <a class="btn btn-primary" href="{{ route('admin.product.edit', $item->id) }}"
                                    role="button">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure ???')" type="submit"
                                    class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Category')

@section('main')
    <div class="container">
        <h2 class="text-center my-4"></h2>
        <a name="" id="" class="btn btn-primary" href="{{ route('admin.category.create') }}" role="button">+Add
            New</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('admin.category.destroy', $item->id) }}" method="post">
                                <a class="btn btn-primary" href="{{ route('admin.category.edit', $item->id) }}"
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
        {{ $categories->links() }}
    </div>
@endsection

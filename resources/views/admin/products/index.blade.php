@extends('layouts.admin')

@section('title')
<div class="d-flex justify-content-between">
    <h2>Products</h2>
    <div class="">
        <a class="btn btn-sm btn-outline-primary" href="{{ route('products.create') }}">Create</a>
        <a class="btn btn-sm btn-outline-dark" href="{{ route('products.trash') }}">Trash</a>
    </div>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
@endsection

@section('content')

    <x-alert />

    <x-message type="info" :count="1 + 1" class="display-1">
        <x-slot name="title">Info</x-slot>
        Welcome to Laravel
    </x-message>

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Status</th>
                <th>Created At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><img src="{{ $product->image_url }}" width="60" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ $product->formatted_price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>

                <td><a href="{{ route('products.edit', $product->id) }}"
                    class="btn btn-sm btn-success">
                    <i class="fas fa-edit"></i>
                </a></td>

                <td><form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $products->links() }}


@endsection


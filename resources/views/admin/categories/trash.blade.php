@extends('layouts.admin')

@section('title')
<div class="d-flex justify-content-between">
    <h2>Trashed Categories</h2>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
</ol>
@endsection

@section('content')

    <x-alert />
    <div class="d-flex mb-4">
        <form action="{{ route('categories.restore') }}" method="post" class="mr-3">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-sm btn-warning">Restore All</button>
        </form>
        <form action="{{ route('categories.force-delete') }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Empty Trash</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Parent ID</th>
                <th>Status</th>
                <th>Deleted At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td><img src="{{ asset('uploads/' . $category->image_path) }}" width="60" alt=""></td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->parent_name }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->deleted_at }}</td>
                <td>
                <form action="{{ route('categories.restore', $category->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-sm btn-warning">Restore</button>
                </form>
                </td>
                <td><form action="{{ route('categories.force-delete', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Delete Forever</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $categories->links() }}


@endsection


@extends('layout.master')

@section('title', 'Categories')

@section('content')
<div class="max-w-5xl mx-auto px-6">
    <h1 class="text-3xl font-bold mb-6">Categories</h1>
    <div class="card bg-base-100 shadow-md mb-8">
        <div class="card-body">
            <h2 class="card-title">Add Category</h2>

            <form action="/categories/store" method="POST" class="flex gap-4">
                @csrf
                <input type="text" name="name" placeholder="Category Name" class="input input-bordered w-full" required>
                <button type="submit" class="btn btn-primary"> Save </button>
            </form>
        </div>
    </div>

    <div class="card bg-base-100 shadow-md">
        <div class="card-body">
            <h2 class="card-title mb-4">Category List</h2>

            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
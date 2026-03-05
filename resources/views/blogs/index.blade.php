@extends('layout.master')
@section('title', 'Blog List')

@section('content')
<div class="container mx-auto p-4 md:p-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold text-gray-700">Blog List</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary"> + Create Blog </a>
    </div>

    <div class="overflow-x-auto">
        <table class="table w-full table-zebra">
            <thead class="bg-base-200">
                <tr>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>
                        @if($blog->status)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Unpublished</span>
                        @endif
                    </td>
                    <td class="flex flex-wrap justify-center gap-2">
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info"> View </a>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-secondary"> Edit </a>
                        @if($blog->status == 0)
                            <a href="{{ route('blogs.publish', $blog->id) }}" class="btn btn-sm btn-success"> Publish </a>
                        @else
                            <a href="{{ route('blogs.unpublish', $blog->id) }}" class="btn btn-sm btn-warning"> Unpublish </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
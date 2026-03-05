@extends('layout.master')
@section('title', 'Edit Blog')

@section('content')
<div class="container mx-auto p-4 md:p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Edit Blog</h1>
        <p class="text-sm text-gray-500 mt-1">Update the blog details below.</p>
    </div>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-base-100 p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div>
            <label class="label font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="input input-bordered w-full">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="label font-semibold">Category</label>
            <select name="category_id" class="select select-bordered w-full">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $blog->category_id)==$category->id)?'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="label font-semibold">Content</label>
            <textarea name="content" class="textarea textarea-bordered w-full h-40">{{ old('content', $blog->content) }}</textarea>
            @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="label font-semibold">Current Feature Image</label>
            <div class="mb-2">
                <img src="{{ asset('storage/blogs/'.$blog->feature_image) }}" alt="Feature Image" class="w-64 h-40 object-cover rounded-md shadow-sm">
            </div>
        </div>
        <div>
            <label class="label font-semibold">Change Feature Image</label>
            <input type="file" name="feature_image" class="file-input file-input-bordered w-full">
            @error('feature_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        <div class="pt-4">
            <button type="submit" class="btn btn-primary w-full md:w-auto">Update Blog</button>
        </div>
    </form>

    <div class="mt-6">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary"> ← Back to Blogs </a>
    </div>
</div>
@endsection
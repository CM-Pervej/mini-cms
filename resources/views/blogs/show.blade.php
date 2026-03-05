@extends('layout.master')
@section('title', $blog->title)

@section('content')
<div class="container mx-auto p-4 md:p-6">
    <div class="mb-6">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">{{ $blog->title }}</h1>
        <p class="text-sm text-gray-500">Category: 
            <span class="font-semibold text-gray-700">{{ $blog->category->name }}</span>
        </p>
        <p class="text-sm text-gray-500 mt-1">Status: 
            @if($blog->status)
                <span class="badge badge-success">Published</span>
            @else
                <span class="badge badge-warning">Unpublished</span>
            @endif
        </p>
    </div>

    @if($blog->feature_image)
        <div class="mb-6 flex justify-center">
            <img src="{{ asset('storage/blogs/'.$blog->feature_image) }}" 
                 alt="Feature Image" 
                 class="w-full max-w-3xl rounded-lg shadow-md object-cover">
        </div>
    @endif

    <div class="prose max-w-full md:max-w-3xl mx-auto text-gray-700">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <div class="mt-8 flex justify-center md:justify-start">
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary"> ← Back to Blogs </a>
    </div>
</div>
@endsection
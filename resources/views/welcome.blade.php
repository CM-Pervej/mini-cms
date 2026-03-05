@extends('layout.master')

@section('title', 'Dashboard')

@section('content')

<div class="hero min-h-[70vh]">
    <div class="hero-content text-center">
        <div class="max-w-xl">
            <h1 class="text-5xl font-bold">Mini Content Management System</h1>

            <p class="py-6 text-lg">
                This system allows administrators to manage blog posts efficiently.
                Each blog post belongs to a category and includes a feature image.
                Users can create, update, view, and publish or unpublish blog posts.
            </p>

            <div class="flex justify-center gap-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-primary">View Blogs</a>
                <a href="{{ route('category.index') }}" class="btn btn-outline">
                    View Category
                </a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto pb-16 px-6">
    <div class="grid md:grid-cols-3 gap-6">

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title">Create Blog</h2>
                <p>Add new blog posts with category and feature image.</p>
            </div>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title">Manage Blogs</h2>
                <p>Update blog content or edit details anytime.</p>
            </div>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title">Publish Control</h2>
                <p>Publish or unpublish blogs to control visibility.</p>
            </div>
        </div>

    </div>
</div>

@endsection
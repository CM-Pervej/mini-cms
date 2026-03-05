<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('title', 'asc')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'feature_image' => 'required|image|max:2048', // 2MB max
        ]);

        $image = $request->file('feature_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('blogs', $imageName, 'public');

        Blog::create([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
            'feature_image' => $imageName,
            'status' => 0, // default unpublished
        ]);

        return redirect()->route('blogs.index');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'feature_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'category_id', 'content']);

        if ($request->hasFile('feature_image')) {
            Storage::disk('public')->delete('blogs/' . $blog->feature_image);

            $image = $request->file('feature_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('blogs', $imageName, 'public');
            $data['feature_image'] = $imageName;
        }

        $blog->update($data);

        return redirect()->route('blogs.index');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function publish(Blog $blog)
    {
        $blog->update(['status' => 1]);
        return redirect()->route('blogs.index');
    }

    public function unpublish(Blog $blog)
    {
        $blog->update(['status' => 0]);
        return redirect()->route('blogs.index');
    }
}
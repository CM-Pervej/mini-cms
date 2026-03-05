<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('name', 'asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name'  => 'required|string',
        ]);

        Category::create([
            'name'  => $request->name
        ]);

        return redirect()->route('category.index')->with('success', 'Category created succesfully!');
    }
}

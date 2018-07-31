<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();

        return view('admin.categories', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categoryedit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect('admin/categories');
    }
}

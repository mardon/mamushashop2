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

        flash('Kategorie byla uložena!')->success()->important();

        return redirect('admin/categories');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');;
        return view('admin.categorycreate', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories',
        ] , [
            'name.required' => 'Zadejte název kategorie',
            'slug.required' => 'Zadejte slug'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        flash('Kategorie byla uložena!')->success()->important();

        return redirect('admin/categories');
    }

}

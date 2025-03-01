<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories = [
        ['id' => 1, 'name' => 'Headphones'],
        ['id' => 2, 'name' => 'Earbuds'],
        ['id' => 3, 'name' => 'Speakers'],
        ['id' => 4, 'name' => 'Accessories'],
    ];

    public function index()
    {
        return view('admin.manage_categories', ['categories' => $this->categories]);
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}

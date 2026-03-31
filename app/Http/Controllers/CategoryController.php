<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all);

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show')->with('category', $category);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if ($category) {
            return redirect()->route('categories.index')->with('msg', 'Categoria não encontrada.');
        }

        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('msg', 'Categoria atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('categories.index')->with('msg', 'Categoria deletada com sucesso.');
    }

}

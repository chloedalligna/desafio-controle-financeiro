<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('transactions.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('transactions.categories.create');
    }

    public function store(Request $request)
    {
//        $transaction = new Transaction();
//        $transaction = $request->input->all();
//        $transaction->save();
//        redirect(view('transactions.index', ['transactions' => Transaction::all()]));

        Category::create($request->all);
        return redirect()->route('transactions.categories.index');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('transactions.categories.show')->with('category', $category);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if ($category) {
            return redirect()->route('transactions.categoriescategories.index')->with('msg', 'Categoria não encontrada.');
        }

        return view('transactions.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->update($request->all());

//        $transaction->name = $request->input('name);
//        $transaction->description = $request->input('description);
//        $transaction->value = $request->input('value);
//        $transaction->category_id = $request->input('category_id);

        return redirect()->route('transactions.categories.index')->with('msg', 'Categoria atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('transactions.categories.index')->with('msg', 'Categoria deletada com sucesso.');
    }
}

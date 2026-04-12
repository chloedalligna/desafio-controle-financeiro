<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = auth()->user()->categories()->get()->all();
        $msg = $request->session()->get('msg');

        return view('categories.index', [
            'categories' => $categories,
            'msg' => $msg,
        ]);
    }

    public function create()
    {
//        $this->authorize('create');
        $types = Type::all();

        return view('categories.create', [
            'types' => $types,
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        $request->merge(['user_id' => auth()->user()->attributesToArray()['id']]);
        auth()->user()->categories()->create($request->except('_token'));

        $request->session()->flash('msg', 'Categoria criada com sucesso.');

        return to_route('categories.index');
    }

//    vv

    public function edit(int $id, Request $request)
    {
        $category = auth()->user()->categories()->get()->find($id);
        $types = Type::all();

        if (!$category) {
            $request->session()->flash('msg', 'Categoria não encontrada.');
            return to_route('categories.index');
        }

        return view('categories.edit', [
            'category' => $category,
            'types' => $types
        ]);
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $category = auth()->user()->categories()->get()->find($id);

        $category->update($request->except('_token'));

        $request->session()->flash('msg', 'Categoria atualizada com sucesso.');

        return to_route('categories.index');
    }

    public function destroy(int $id, Request $request)
    {
        $category = auth()->user()->categories()->get()->find($id);

        $category->delete();

        $request->session()->flash('msg', 'Categoria deletada com sucesso.');

        return to_route('categories.index');
    }

}

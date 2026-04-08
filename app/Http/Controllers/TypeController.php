<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionsFormRequest;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $types = Type::all();
//
//        return view('types.index')->with('types', $types);
//    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        return view('types.create');
//    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        Type::create($request->all);
//
//        return to_route('types.index');
//    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        $type = Type::find($id);
//
//        return view('types.show')->with('type', $type);
//    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $type = Type::find($id);
//
//        if ($type) {
//            return to_route('types.index')->with('msg', 'Tipo não encontrado.');
//        }
//
//        return view('types.edit')->with('type', $type);
//    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, string $id)
//    {
//        $type = Type::find($id);
//
//        $type->update($request->all());
//
//        return to_route('types.index')->with('msg', 'Tipo atualizado com sucesso.');
//    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(string $id)
//    {
//        $type = Type::find($id);
//
//        $type->delete();
//
//        return to_route('types.index')->with('msg', 'Tipo deletado com sucesso.');
//    }

}

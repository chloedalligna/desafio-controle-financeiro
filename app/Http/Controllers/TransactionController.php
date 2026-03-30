<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\Type;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('transactions.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
//        dd($request);
//        $transaction = new Transaction();
//        $transaction->save();

        Transaction::create($request->except('_token'));

        return to_route('transactions.index');
    }

    public function show(int $id)
    {
        $transaction = Transaction::find($id);

        return view('transactions.show', [
            'transaction' => $transaction
        ]);
    }

    public function edit(int $id)
    {
        $transaction = Transaction::find($id);
        $categories = Category::all();

        if (!$transaction) {
            return to_route('transactions.index')->with('msg', 'Transação não encontrada.');
        }

        return view('transactions.edit', [
            'transaction' => $transaction,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->update($request->except('_token'));

//        $transaction->name = $request->input('name);
//        $transaction->description = $request->input('description);
//        $transaction->value = $request->input('value);
//        $transaction->category_id = $request->input('category_id);

        return redirect()->route('transactions.index')->with('msg', 'Transação atualizada com sucesso.');
    }

    public function destroy(int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return to_route('transactions.index')->with('msg', 'Transação deletada com sucesso.');
    }
}

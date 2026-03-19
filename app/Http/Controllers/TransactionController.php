<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('transactions.index')->with('transactions', $transactions);
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
//        $transaction = new Transaction();
//        $transaction = $request->input->all();
//        $transaction->save();
//        redirect(view('transactions.index', ['transactions' => Transaction::all()]));

        Transaction::create($request->all);
        return redirect()->route('transactions.index');
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);

        return view('transactions.show')->with('transaction', $transaction);
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);

        if ($transaction) {
            return redirect()->route('transactions.index')->with('msg', 'Transação não encontrada.');
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        $transaction->update($request->all());

//        $transaction->name = $request->input('name);
//        $transaction->description = $request->input('description);
//        $transaction->value = $request->input('value);
//        $transaction->category_id = $request->input('category_id);

        return redirect()->route('transactions.index')->with('msg', 'Transação atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return redirect()->route('transactions.index')->with('msg', 'Transação deletada com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionsFormRequest;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Type;
use App\Repositories\TransactionsRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private TransactionsRepository $transactionsRepository;
    public function __construct(TransactionsRepository $transactionsRepository)
    {
       $this->transactionsRepository = $transactionsRepository;
    }

    public function index(Request $request)
    {
        $dates = $this->transactionsRepository->rangeTime();
        $types = Type::all();
        $categories = Category::all();

        $transactions = Transaction::filterBy(request()->all())->get();
        $transactionsOrder = $transactions->sortBy('date');

        $total = $this->transactionsRepository->totalSum($transactions);
        $incomes = $this->transactionsRepository->incomesSum($transactions);
        $expenses = $this->transactionsRepository->expensesSum($transactions);

        $msg = $request->session()->get('msg');

        return view('transactions.index', [
            'msg' => $msg,
            'dates' => $dates,
            'types' => $types,
            'categories' => $categories,
            'transactions' => $transactionsOrder,
            'total' => $total,
            'incomes' => $incomes,
            'expenses' => $expenses
        ]);
    }

    public function create()
    {
        $types = Type::all();
        $categories = Category::all();

        return view('transactions.create', [
            'types' => $types,
            'categories' => $categories
        ]);
    }

    public function store(TransactionsFormRequest $request)
    {
        $cleanValue = self::cleanMoneyValue($request->input('value'));
        $request->merge(['value' => $cleanValue]);
        $request->merge(['user_id' => session('user_id')]);

        Transaction::create($request->except('_token'));

        $request->session()->flash('msg', 'Transação criada com sucesso.');


        return to_route('transactions.index');
    }

//    public function show(int $id)
//    {
//        $transaction = Transaction::find($id);
//
//        return view('transactions.show', [
//            'transaction' => $transaction
//        ]);
//    }

    public function edit(int $id, Request $request)
    {
        $transaction = Transaction::find($id);
        $types = Type::all();
        $categories = Category::all();

        if (!$transaction) {
            $request->session()->flash('msg', 'Transação não encontrada.');
            return to_route('transactions.index');
        }

        return view('transactions.edit', [
            'transaction' => $transaction,
            'types' => $types,
            'categories' => $categories
        ]);
    }

    public function update(TransactionsFormRequest $request, int $id)
    {
        $transaction = Transaction::find($id);

        $cleanValue = self::cleanMoneyValue($request->input('value'));
        $request->merge(['value' => $cleanValue]);

        $transaction->update($request->except('_token'));

        $request->session()->flash('msg', 'Transação atualizada com sucesso.');

        return to_route('transactions.index');
    }

    public function destroy(int $id, TransactionsFormRequest $request)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        $request->session()->flash('msg', 'Transação deletada com sucesso.');

        return to_route('transactions.index');
    }

    public function cleanMoneyValue(string $value): float
    {
        $firstValue = str_replace("R$ ", "", $value);
        $secondValue = str_replace(".", "", $firstValue);
        $cleanValue = str_replace(",", ".", $secondValue);
        return (float) $cleanValue;
    }

}

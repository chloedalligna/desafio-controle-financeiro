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

    public function index()
    {
        $transactions = Transaction::orderBy('date', 'asc')->all();

        $total = $this->transactionsRepository->totalSum($transactions);
        $incomes = $this->transactionsRepository->incomesSum($transactions);
        $expenses = $this->transactionsRepository->expensesSum($transactions);


        return view('transactions.index', [
            'transactions' => $transactions,
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

    public function update(TransactionsFormRequest $request, int $id)
    {
        $transaction = Transaction::find($id);

        $cleanValue = self::cleanMoneyValue($request->input('value'));
        $request->merge(['value' => $cleanValue]);

        $transaction->update($request->except('_token'));

        return to_route('transactions.index')->with('msg', 'Transação atualizada com sucesso.');
    }

    public function destroy(int $id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        return to_route('transactions.index')->with('msg', 'Transação deletada com sucesso.');
    }

    public function cleanMoneyValue(string $value): float
    {
        $firstValue = str_replace("R$ ", "", $value);
        $secondValue = str_replace(".", "", $firstValue);
        $cleanValue = str_replace(",", ".", $secondValue);
        return (float) $cleanValue;
    }

}

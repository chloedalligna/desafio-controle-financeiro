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
        $variables = $this->transactionsRepository->read($request);

        return view('transactions.index', $variables);
    }

    public function create()
    {
        $types = Type::all();
        $categories = auth()->user()->categories()->get()->all();

        return view('transactions.create', [
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    public function store(TransactionsFormRequest $request)
    {
        $cleanValue = self::cleanMoneyValue($request->input('value'));
        $request->merge(['value' => $cleanValue]);
        $request->merge(['user_id' => session('user_id')]);

        auth()->user()->transactions()->create($request->except('_token'));

        $request->session()->flash('msg', 'Transação criada com sucesso.');

        return to_route('transactions.index');
    }

    public function edit(int $id, Request $request)
    {
        $transaction = auth()->user()->transactions()->get()->find($id);
//        dd($transaction);
        $types = Type::all();
        $categories = auth()->user()->categories()->get()->all();

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
        $transaction = auth()->user()->transactions()->get()->find($id);

        $cleanValue = self::cleanMoneyValue($request->input('value'));
        $request->merge(['value' => $cleanValue]);

        $transaction->update($request->except('_token'));

        $request->session()->flash('msg', 'Transação atualizada com sucesso.');

        return to_route('transactions.index');
    }

    public function destroy(int $id, Request $request)
    {
        $transaction = auth()->user()->transactions()->get()->find($id);

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

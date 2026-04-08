<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Models\Type;
use Illuminate\Http\Request;

class TransactionsRepository
{
    public function read(Request $request): array
    {
        $dates = $this->rangeTime();
        $types = Type::all();
        $categories = auth()->user()->categories()->get()->all();

        $transactions = auth()->user()->transactions()->filterBy(request()->all())->get();
        $transactionsOrder = $transactions->sortBy('date');

        $total = $this->totalSum($transactions);
        $incomes = $this->incomesSum($transactions);
        $expenses = $this->expensesSum($transactions);

        $msg = $request->session()->get('msg');

        $query = $request->getQueryString();

        return [
            'query' => $query,
            'msg' => $msg,
            'dates' => $dates,
            'types' => $types,
            'categories' => $categories,
            'transactions' => $transactionsOrder,
            'total' => $total,
            'incomes' => $incomes,
            'expenses' => $expenses
        ];
    }

    public function incomesSum($transactions)
    {
        $incomes = 0.00;

        foreach ($transactions as $transaction) {
            if ($transaction->category->type_id === 2) {
                $incomes += $transaction->value;
            }
        }

        return $incomes;
    }

    public function expensesSum($transactions)
    {
        $expenses = 0.00;

        foreach ($transactions as $transaction) {
            if ($transaction->category->type_id === 1) {
                $expenses += $transaction->value;
            }
        }

        return $expenses;
    }

    public function totalSum($transactions)
    {
        return self::incomesSum($transactions) - self::expensesSum($transactions);
    }

    public function rangeTime()
    {
        $transactions = auth()->user()->transactions()->get()->all();

        $dates = [];

        foreach ($transactions as $transaction) {
            $dates[] = $transaction->attributesToArray()['date'];
        }

        $explodedDates = [];

        foreach ($dates as $oneDate) {
            $explodedDates[] = explode("-", $oneDate);
        }

        return $explodedDates;

    }

}

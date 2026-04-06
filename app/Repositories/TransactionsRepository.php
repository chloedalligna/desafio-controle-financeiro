<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionsRepository
{
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
        $transactions = Transaction::all();

        $dates = $transactions->map->only(['date']);

        $explodedDates = [];

        foreach ($dates as $oneDate) {
            $explodedDates[] = explode("-", $oneDate['date']);
        }

        return $explodedDates;

    }

}

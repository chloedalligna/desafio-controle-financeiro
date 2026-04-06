<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionsRepository
{
    public function incomesSum()
    {
        $transactions = Transaction::whereHas('category', function ($q) {
            $q->where('type_id', 2);
        });

        return $transactions->sum('value');

    }

    public function expensesSum()
    {
        return Transaction::whereHas('category', function ($q) {
            $q->where('type_id', 1);
        })->sum('value');
    }

    public function totalSum()
    {
        return self::incomesSum() - self::expensesSum();
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

    public function transactionsByCategory()
    {

    }

}

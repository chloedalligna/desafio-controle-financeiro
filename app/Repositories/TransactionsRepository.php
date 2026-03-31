<?php

namespace App\Repositories;

class TransactionsRepository
{
    public function incomesSum($transactions)
    {
        $incomesSum = 0.00;
        foreach ($transactions as $transaction) {
            $incomesSum += $transaction->value
                ->where($transaction->category->type_id === 2);
        }

        return $incomesSum;
    }

    public function expensesSum($transactions)
    {
        $expensesSum = 0.00;
        foreach ($transactions as $transaction) {
            $expensesSum += $transaction->value
                ->where($transaction->category->type_id === 1);
        }

        return $expensesSum;
    }

    public function totalSum($transactions)
    {
        return self::incomesSum($transactions) - self::expensesSum($transactions);
    }

}

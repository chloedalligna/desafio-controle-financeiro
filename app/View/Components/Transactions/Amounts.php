<?php

namespace App\View\Components\Transactions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Amounts extends Component
{
    public float $total;
    public float $incomes;
    public float $expenses;

    /**
     * Create a new component instance.
     */
    public function __construct(float $total, float $incomes, float $expenses)
    {
        $this->total = $total;
        $this->incomes = $incomes;
        $this->expenses = $expenses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.transactions.amounts');
    }
}

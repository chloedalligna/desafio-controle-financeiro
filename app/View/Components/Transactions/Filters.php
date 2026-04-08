<?php

namespace App\View\Components\Transactions;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Filters extends Component
{

    public array $dates = [];
    public Collection|array $types;
    public Collection|array $categories;

    /**
     * Create a new component instance.
     */
    public function __construct($dates, Collection|array $types, Collection|array $categories)
    {
        $this->dates = $dates;
        $this->types = $types;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.transactions.filters');
    }
}

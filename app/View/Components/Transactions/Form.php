<?php

namespace App\View\Components\Transactions;

use App\Models\Type;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{

    public string $action;
    public bool $update;
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct($action, $update, $categories)
    {
        $this->action = $action;
        $this->update = $update;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.transactions.form');
    }
}

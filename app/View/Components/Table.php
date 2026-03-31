<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Table extends Component
{
    public Collection|array $collection;
    public array $keys;
    public array $textColor = [ 1 => 'text-red-500', 2 => 'text-green-500' ];
    public string $edit;
    public string $action;

    /**
     * Create a new component instance.
     */
    public function __construct(Collection|array $collection, array $keys, string $edit, string $action)
    {
        $this->collection = $collection;
        $this->keys = $keys;
        $this->edit = $edit;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}

<?php

namespace App\View\Components\Categories;

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

    /**
     * Create a new component instance.
     */
    public function __construct(Collection|array $collection, array $keys, string $edit)
    {
        $this->collection = $collection;
        $this->keys = $keys;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categories.table');
    }
}

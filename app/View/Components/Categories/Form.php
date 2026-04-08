<?php

namespace App\View\Components\Categories;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Form extends Component
{
    public string $action;
    public bool $update;
    public Collection|array $types;
    public $category;
    /**
     * Create a new component instance.
     */
    public function __construct(string $action, bool $update, Collection|array $types, $category)
    {
        $this->action = $action;
        $this->update = $update;
        $this->types = $types;
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categories.form');
    }
}

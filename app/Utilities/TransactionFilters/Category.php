<?php

namespace App\Utilities\TransactionFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Category extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->where('category_id', $value->id);
    }
}

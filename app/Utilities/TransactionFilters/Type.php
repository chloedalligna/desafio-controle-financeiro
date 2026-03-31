<?php

namespace App\Utilities\TransactionFilters;

use App\Utilities\FilterBuilder;
use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Type extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->whereYear('type_id', $value->category->type_id);
    }
}

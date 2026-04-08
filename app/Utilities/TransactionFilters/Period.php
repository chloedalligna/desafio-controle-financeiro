<?php

namespace App\Utilities\TransactionFilters;

use App\Utilities\FilterContract;
use App\Utilities\QueryFilter;

class Period extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $explodedDate = explode("-", $value);

        $this->query->whereYear('date', $explodedDate[0])->whereMonth('date', $explodedDate[1])->get()->all();
    }
}

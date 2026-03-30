<?php

namespace App\Repositories;

use App\Models\Type;

class TypesRepository
{

    public function __construct()
    {
    }

    public function categoriesByType(Type $type)
    {
        return $categories = $type->categories();
    }

}

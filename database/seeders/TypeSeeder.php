<?php

namespace Database\Seeders;

use App\Utilities\TransactionFilters\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Despesa'
            ],
            [
                'name' => 'Receita'
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}

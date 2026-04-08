<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Aluguel',
                'type_id' => 1,
                'user_id' => session('user_id')
            ],
            [
                'name' => 'Salário',
                'type_id' => 2,
                'user_id' => session('user_id')
            ],
            [
                'name' => 'Freelance',
                'type_id' => 2,
                'user_id' => session('user_id')
            ],
            [
                'name' => 'Supermercado',
                'type_id' => 1,
                'user_id' => session('user_id')
            ],
            [
                'name' => 'Assinaturas',
                'type_id' => 1,
                'user_id' => session('user_id')
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}

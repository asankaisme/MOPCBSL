<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seed categories
        Category::create([
            'categoryName' => 'Laptop'
        ]);
        Category::create([
            'categoryName' => 'Projector'
        ]);
        Category::create([
            'categoryName' => 'Switch'
        ]);
        Category::create([
            'categoryName' => 'Router'
        ]);
        Category::create([
            'categoryName' => 'Monitor'
        ]);
        Category::create([
            'categoryName' => 'CPU'
        ]);
    }
}

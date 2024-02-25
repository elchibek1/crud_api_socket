<?php

namespace Database\Seeders\Category;

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
        $categories = ['clothes', 'food', 'auto', 'books', 'electronic'];

        foreach ($categories as $category){
            Category::firstOrCreate(['body' => $category]);
        }
    }
}

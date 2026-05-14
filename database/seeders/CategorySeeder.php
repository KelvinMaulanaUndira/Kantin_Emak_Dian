<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Makanan',
            'description' => 'Berbagai jenis makanan tradisional dan modern',
        ]);

        Category::create([
            'name' => 'Minuman',
            'description' => 'Minuman segar dan berkualitas',
        ]);

        Category::create([
            'name' => 'Cemilan',
            'description' => 'Cemilan ringan dan lezat',
        ]);
    }
}

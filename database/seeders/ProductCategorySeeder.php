<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            "category_id" => 1,
            "product_id" => 1
        ]);

        ProductCategory::create([
            "category_id" => 2,
            "product_id" => 1
        ]);

        ProductCategory::create([
            "category_id" => 2,
            "product_id" => 2
        ]);

        ProductCategory::create([
            "category_id" => 3,
            "product_id" => 2
        ]);
    }
}

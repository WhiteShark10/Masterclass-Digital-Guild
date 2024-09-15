<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()
            ->count(8)
            ->has(ProductVariant::factory()->count(3))
            ->has(ProductMedia::factory()->count(4))
            ->create();
    }
}

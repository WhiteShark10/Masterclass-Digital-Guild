<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderedProduct;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory()
            ->count(10)
            ->has(OrderedProduct::factory()->count(3))
            ->create();
    }
}

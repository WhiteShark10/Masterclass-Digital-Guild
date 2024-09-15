<?php

namespace Database\Factories;

use App\Models\OrderedProduct;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderedProduct>
 */
class OrderedProductFactory extends Factory
{
    protected $model = OrderedProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}

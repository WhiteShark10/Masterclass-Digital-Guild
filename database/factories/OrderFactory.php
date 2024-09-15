<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subtotal = $this->faker->numberBetween(10000, 100000);
        $fee = $this->faker->numberBetween(1000, 5000);
        $total = $subtotal + $fee;

        return [
            'name' => $this->faker->name(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'contact' => $this->faker->phoneNumber(),
            'delivery_place' => $this->faker->address(),
            'subtotal' => $subtotal,
            'fee' => $fee,
            'total' => $total,
        ];
    }
}

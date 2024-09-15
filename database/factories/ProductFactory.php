<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory(),
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(30, 60)*500,
            'stars' => $this->faker->numberBetween(1, 5),
            'comments' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text(),
        ];
    }
}

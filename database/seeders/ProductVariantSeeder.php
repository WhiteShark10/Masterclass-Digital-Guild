<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Exécute le seeding de la base de données.
     */
    public function run(): void
    {
        // Récupère tous les produits existants
        $products = Product::all();

        // Pour chaque produit, crée plusieurs variantes
        foreach ($products as $product) {
            ProductVariant::factory()
                ->count(5) // Crée 5 variantes par produit
                ->create(['product_id' => $product->id]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanierRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Http\Request;

class traitementController extends Controller
{
    public function index(){

        // Precharger le produits associés au differentes marques ainsi que leur images
        $brands = Brand::limit(4)->get();

        // Precharger le produits ainsi que leur images
        $products = Product::with("productmedia")->limit(8)->get();
        // dd($products);

        return view("index",compact(
            "brands",
            "products",
        ));
    }

    public function ProductShow(Product $product){
        $product::with(["brands","productmedia","productvariant"]);
        return view("ShowProduct",compact(
            "product",
        ));
    }

    public function getPanier(Request $request)
    {
        // Récupérer les données du panier envoyé par javascript
        $cartItems = $request->json()->all(); // Récupérer toutes les données envoyées

        // Récupérer les IDs et tailles des produits
        $productIds = array_column($cartItems, 'productId');
        $size = array_column($cartItems, 'size');

        // Récupérer les produits correspondants avec leurs relations
        $products = Product::with(["productmedia","productvariant" => function($query) use($size){
            $query->whereIn("size",$size);
        }]) // Charger uniquement productmedia
            ->whereIn("id", $productIds)
            ->get();

        // Créer un tableau de réponse
        $response = [];

        foreach ($products as $product) {
            // Filtrer les articles du panier pour le produit actuel
            $cartItemsForProduct = collect($cartItems)->where('productId', $product->id);

            foreach ($cartItemsForProduct as $cartItem) {
                $response[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'size' => $cartItem['size'], // Inclure la taille dans la réponse
                    'quantity' => $cartItem['quantity'],
                    'productmedia' => $product->productmedia, // Inclure uniquement productmedia
                    'productvariant' => $product->productVariant,
                ];
            }
        }

        return response()->json($response);
    }

}

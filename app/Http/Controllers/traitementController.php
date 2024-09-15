<?php

namespace App\Http\Controllers;

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
        $product::with(["brands","product_media","product_variant"]);
        return view("ShowProduct");
    }
}

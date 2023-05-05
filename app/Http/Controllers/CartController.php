<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{
    public function getCart() {
        // $cart = $_POST["cart"];
        // $products = DB::table('products')->whereIn('id', $cart)->pluck('name', 'price');
        // return $products;
        $attributes = request()->validate([
            'cart' => ['required']
        ]);
        $cart = $attributes['cart'];
        // ddd($cart);
        $products = Product::whereIn('id', array_keys($cart))->get(['id', 'name', 'price'])->toArray();
        return json_encode($products);
    }

    public function getItem() {
        $attributes = request()->validate([
            'id' => ['required', 'integer']
        ]);
        $id = $attributes['id'];
        // ddd($id);
        $product = Product::where('id', $id)->get(['name', 'price'])->toArray();
        return json_encode($product);
    }
}

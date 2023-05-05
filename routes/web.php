<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'products' => Product::get()
    ]);
});

Route::get('/products/{product}', function (Product $product) {
    return view('product', [
        'product' => $product,
        'ratings' => $product->ratings
    ]);
});

Route::post('/getItem', [CartController::class, 'getItem']);
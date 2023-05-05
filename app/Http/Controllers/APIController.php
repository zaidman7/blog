<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function addProduct(Request $req, string $name, string $description, float $price) {
        $attributes = $req->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'decimal:2']
        ]);

        $product = new Product();
        $product->name = $attributes['name'];
        $product->description = $attributes['description'];
        $product->price = $attributes['price'];
        $product->save();

        return true;
    }

    public function fileUpload(Request $req, Product $product) {
        $req->validate([
            'file' => 'required|mimes:jpg,jpeg|max:8192'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->item_id = $item->id;
            $fileModel->save();
            return redirect('/');
        }
   }
}

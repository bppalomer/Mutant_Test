<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function showFormToAddProducts (){
        return view('components.add_product');
    }

    public function submitFormToAddProducts(Request $request){
        
        $validatedData = $request->validate([
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'productDescription' => 'required|string',
        ]);

        $product = new Product;
        $product->productName = $validatedData['productName'];
        $product->productPrice = $validatedData['productPrice'];
        $product->productDescription = $validatedData['productDescription'];

        $product->save();

        return redirect()->route('home')->with('success', 'Product added successfully!');
    
    }
}

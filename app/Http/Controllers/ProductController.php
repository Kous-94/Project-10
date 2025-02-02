<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
        public function index(){
            $products = Product::all();
            return view('products.index' , ['products' => $products]);
           
        }
        public function create(){
            return view('products.create');
        }
        public function store(Request $request){
            // store product data in database
            // redirect to product index page
           $data = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
           ]);
           $newProduct = Product::create($data);

              return redirect(route('product.index'));
        }
        public function edit(Product $product){
            return view('products.edit', ['product' => $product]);      
        }
        public function update(Request $request, Product $product){
            $data = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'description' => 'required',
            ]);
            $product->update($data);
            return redirect(route('product.index'))->with('success', 'Product updated successfully');
        }
        public function destroy(Product $product){
            $product->delete();
            return redirect(route('product.index'))->with('success', 'Product deleted successfully');
        }
}

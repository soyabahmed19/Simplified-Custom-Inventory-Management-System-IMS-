<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

    
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    public function edit($id)
        {
            $product = Product::find($id);
            return view('products.edit', compact('product'));
        }

    public function update(Request $request, $id)
        {
          
            $request->validate([
                'name' => 'required',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            
            $product = Product::find($id);

            
            $product->update($request->all());

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }

        public function destroy($id)
        {
            
            $product = Product::find($id);

            
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        }




}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        return view('product.index', compact('product'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ],[
            'name.required' => 'The name field is required.',
            'price.required' => 'The price field is required.',
            'description.required' => 'The description field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        if (Auth::id() !== $product->user_id) {
            return redirect()->route('product')->withErrors('Unauthorized access.');
        }

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if (Auth::id() !== $product->user_id) {
            return redirect()->route('product')->withErrors('Unauthorized access.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->update($request->all());

        return redirect()->route('product')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if (Auth::id() !== $product->user_id) {
            return redirect()->route('product')->withErrors('Unauthorized access.');
        }
        
        $product->delete();

        return redirect()->route('product')->with('success', 'Product deleted successfully!');
    }
}

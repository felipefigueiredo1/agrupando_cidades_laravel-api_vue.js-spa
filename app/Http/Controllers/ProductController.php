<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Campaign;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->toArray();
        $campaigns = Campaign::with('product')->get();
        return response()->json(['products' => array_reverse($products), 'campaigns' => $campaigns]);
    }

    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'price' => (int)$request->input('price'),
            'campaign_id' => $request->input('campaign_id'),
        ]);

        $product->save();

        return response()->json('Product created!');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json('Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted!');
    }
}

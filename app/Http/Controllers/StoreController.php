<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderByDesc('created_at', 'desc')->limit(3)->get();
        return view('store.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view('product.form',['product' => $product , 'isUpdate' => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formFields = $request->validated();
        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('product', 'public');
        }
        Product::create($formFields);
        return to_route('products.index')->with('success','Product create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.form',['product' => $product , 'isUpdate' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $formFields = $request->validated();
        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('product', 'public');
        }
        $product->fill($formFields)->save();
        return to_route('products.index')->with('success','Product Update seccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('success','Product delete successfully');
    }
}

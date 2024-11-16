<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::query()->with('category')->paginate(5);
        return view('product.index',['products' => $products , 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('product.form',['product' => $product, 'categories' => $categories , 'isUpdate' => false]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.form',['product' => $product, 'categories' => $categories , 'isUpdate' => true]);
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

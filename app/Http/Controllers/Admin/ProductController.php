<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products',compact('products'));
    }

    public function create()
    {
        $products = $categories = Category::with('children')->get();
        return view('admin.product_create',compact('products'));
    }

    public function store(Request $request)
    {
        $products = new Product;

        $products->title = $request->title;
        $products->keywords = $request->keywords;
        $products->description = $request->description;
        $products->image = Storage::putFile('/images/',$request->file('image'));
        $products->category_id = $request->category_id;
        $products->user_id = Auth::id();
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->minquantity = $request->minquantity;
        $products->tax = $request->tax;
        $products->detail = $request->detail;
        $products->slug = Str::slug($request->title);
        $products->status = $request->status;
        $products->created_at = now();

        $products->save();

        return redirect()->route('admin_products');
    }

    public function show(Product $product)
    {
        return ('show');
    }

    public function edit(Product $product , $id)
    {
        $products = Product::find($id);//data
        $categories = Category::with('children')->get(); //datalist

        return view('admin.product_edit', compact('products', 'categories'));
    }

    public function update(Request $request, Product $product, $id)
    {
        $update = Product::find($id);

        $update->title = $request->title;
        $update->keywords = $request->keywords;
        $update->description = $request->description;
        if ($request->hasFile('image')) {
            $update->image = $request->image->storeAs('/uploads/', $request->image->getClientOriginalName());
        }
        $update->category_id = $request->category_id;
        $update->user_id = Auth::id();
        $update->price = $request->price;
        $update->quantity = $request->quantity;
        $update->minquantity = $request->minquantity;
        $update->tax = $request->tax;
        $update->detail = $request->detail;
        $update->slug = Str::slug($request->title);
        $update->status = $request->status;
        $update->updated_at = now();

        $update->save();
        return redirect()->route('admin_products');
    }

    public function destroy(Product $product, $id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return redirect()->route('admin_products');
    }
}

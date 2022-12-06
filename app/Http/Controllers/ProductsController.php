<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Product::where('user_id', Auth::id())->get();
        return view('home.user_product',compact('data'));
    }

    public function create()
    {
        $data = $categories = Category::with('children')->get();
        return view('home.user_product_create',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->image = Storage::putFile('/images/',$request->file('image'));
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->detail = $request->detail;
        $data->slug = Str::slug($request->title);
        $data->created_at = now();

        $data->save();

        return redirect()->route('user_products')->with('success', 'Created Product');
    }

    public function show(Product $product)
    {
        return ('show');
    }

    public function edit(Product $product , $id)
    {
        $data = Product::find($id);//data
        $datalist = Category::with('children')->get(); //datalist

        return view('home.user_product_edit', compact('data', 'datalist'));
    }

    public function update(Request $request, Product $product, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $data->image = $request->image->storeAs('/uploads/', $request->image->getClientOriginalName());
        }
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->minquantity = $request->minquantity;
        $data->tax = $request->tax;
        $data->detail = $request->detail;
        $data->slug = Str::slug($request->title);
        $data->updated_at = now();

        $data->save();
        return redirect()->route('user_products')->with('success', 'Updated Product');
    }

    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('user_products')->with('success', 'Deleted Product');;
    }
}

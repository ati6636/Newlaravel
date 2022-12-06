<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $images = Product::find($id);
        $image = Image::where('product_id',$id)->get();

        return view('home.user_image_create', compact('images','image'));
    }

    public function store(Request $request, $id)
    {
        $images = new Image;

        $images->title = $request->title;
        $images->product_id = $id;
        $images->image = Storage::putFile('/images/',$request->file('image'));
        $images->created_at = now();

        $images->save();

        return redirect()->back();

    }

    public function show(Image $image)
    {
        //
    }

    public function destroy(Image $image, $id , $product_id)
    {
        $deleteImage = Image::find($id);
        $deleteImage->delete();

        return redirect()->back();
    }
}

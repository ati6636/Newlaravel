<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopcartController extends Controller
{
    public static function countshopcart()
    {
        return Shopcart::where('user_id', Auth::id())->count();
    }

    public function index()
    {
        $data= Shopcart::where('user_id', Auth::id())->get();
        return view('home.user_shopcart',compact('data'));
    }

    public function store(Request $request,$id)
    {
        $data = Shopcart::where('product_id',$id)->where('user_id',Auth::id())->first();
        if ($data)
        {
            $data->quantity = $data->quantity + $request->quantity;
        }else
        {
            $data = new Shopcart;

            $data->product_id = $id;
            $data->user_id = Auth::id();
            $data->quantity = $request->quantity;
        }

        $data->save();
        return redirect()->back()->with('success', 'Added Shopcart');

    }

    public function update(Request $request, Shopcart $shopcart, $id)
    {
        $data = Shopcart::find($id);

        $data->quantity = $request->quantity;
        $data->save();
        return redirect()->back()->with('success', 'Updated Shopcart');

    }

    public function destroy(Shopcart $shopcart, $id)
    {
        $data = Shopcart::find($id);
        $data->delete();
        return redirect()->route('user_shopcart')->with('success', 'Deleted Shopcart');

    }
}

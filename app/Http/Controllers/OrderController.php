<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::where('user_id',Auth::id())->get();

        return view('home.user_order', compact('data'));
    }

    public function create(Request $request)
    {
        $total = $request->total;
        return view('home.user_order_create',compact('total'));
    }

    public function store(Request $request)
    {
        $data = new Order;

        $data->name = $request->name;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->user_id = Auth::id();
        $data->total = $request->total;
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->created_at = now();

        $data->save();

        $datalist= Shopcart::where('user_id', Auth::id())->get();
        foreach ($datalist as $dat)
        {
            $data2 = new Orderitem;
            $data2->user_id = Auth::id();
            $data2->product_id = $dat->product_id;
            $data2->order_id = $data->id;
            $data2->price = $dat->product->price;
            $data2->quantity = $dat->quantity;
            $data2->amount = $dat->quantity * $dat->product->price;
            $data2->created_at = now();

            $data2->save();

        }
        $data3 = Shopcart::where('user_id', Auth::id());
        $data3->delete();
        return redirect()->route('user_order')->with('success', 'Created Order');
    }

    public function show(Order $order, $id)
    {
        $data = Orderitem::where('user_id',Auth::id())->where('order_id', $id)->get();

        return view('home.user_orderitem', compact('data'));
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}

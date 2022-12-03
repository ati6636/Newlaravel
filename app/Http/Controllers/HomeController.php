<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = Setting::first();
        $sliders = Product::select('id', 'title', 'image', 'price', 'slug')->limit(4)->get();
        $dailys = Product::select('id', 'title', 'image', 'price', 'slug')->limit(6)->inRandomOrder()->get();
        $lasts = Product::select('id', 'title', 'image', 'price', 'slug')->limit(4)->orderByDesc('id')->get();
        $pickeds = Product::select('id', 'title', 'image', 'price', 'slug')->limit(4)->inRandomOrder()->get();

        $data =
            [
                'setting' => $setting,
                'page' => 'home',
                'sliders' => $sliders,
                'dailys' => $dailys,
                'lasts' => $lasts,
                'pickeds' => $pickeds,
            ];
        return view('home.index', $data);
    }

    public function product($id, $slug)
    {
        $product = Product::find($id);
        $imageList = Image::where('product_id',$id)->get();

        return view('home.product_detail', ['product' => $product, 'imageList' => $imageList]);

    }

    public function addtocart($id)
    {
        return ('burası');


    }

    public function categoryproducts($id, $slug)
    {
        $setting = Category::find($id);
        $productList = Product::where('category_id',$id)->get();
        return view('home.category_products', compact('productList','setting'));
    }

    public function about()
    {
        $setting = Setting::first();
        return view('home.about', compact('setting'));
    }

    public function referances()
    {
        $setting = Setting::first();
        return view('home.referances', compact('setting'));
    }

    public function faq()
    {
        return view('home.faq');
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', compact('setting'));
    }

    public function sendmessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();

        return redirect()->route('contact')->with('success', 'Mesajınız Kaydedildi. Teşekkür Ederiz.');
    }

    public function login()
    {
        return view('home.login');
    }

    public function loginCheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
        }
        return view('home');
    }

}

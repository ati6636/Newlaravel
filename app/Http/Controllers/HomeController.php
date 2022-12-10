<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Image;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public static function countreview($id)
    {
        return Review::where('product_id', $id)->count();
    }

    public static function averageview($id)
    {
        return Review::where('product_id', $id)->average('rate');
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

    public function getproduct(Request $request)
    {
        $search = $request->input('search');

        $count = Product::where('title', 'like', '%'.'search'.'%')->get()->count();
        if ($count==1)
        {
            $data = Product::where('title', 'like', '%'.'search'.'%')->first();
            return redirect()->route('product',['id'=>$data->id, 'slug'=>$data->slug]);
        }
        else
        {
           return redirect()->route('productlist',['search' => $search]);
        }

    }

    public function productlist($search)
    {
        $datalist = Product::where('title', 'like', '%'.$search.'%')->get();
        return view ('home.search_products',['search' => $search, 'datalist' => $datalist]);
    }

    public function product($id, $slug)
    {
        $product = Product::find($id);
        $imageList = Image::where('product_id', $id)->get();
        $reviews = Review::where('product_id', $id)->get();

        return view('home.product_detail', ['product' => $product, 'imageList' => $imageList, 'reviews' => $reviews]);

    }

    public function addtocart($id)
    {
        return ('burası');


    }

    public function categoryproducts($id, $slug)
    {
        $setting = Category::find($id);
        $productList = Product::where('category_id', $id)->get();
        return view('home.category_products', compact('productList', 'setting'));
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
        $datalist = Faq::all()->sortBy('position');

        return view('home.faq', compact('datalist'));
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
        return view('admin.login');
    }

    public function logincheck(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
            return back()->withErrors([
                'email' => 'The provided Credentials do not match our records',
            ]);
        }else
        {
            return view('home.login');
        }

    }

}

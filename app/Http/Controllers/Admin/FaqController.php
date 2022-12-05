<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $datalist = Faq::all();

        return view('admin.faq', compact('datalist'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $data = new Faq();

        $data->position = $request->position;
        $data->questions = $request->questions;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->created_at = now();

        $data->save();

        return redirect()->route('admin_faq')->with('success','FAQ Saved Successfuly');

    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product, $id)
    {
        $data = Faq::find($id);

        return view('admin.faq_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Faq::find($id);

        $data->position = $request->position;
        $data->questions = $request->questions;
        $data->answer = $request->answer;
        $data->status = $request->status;
        $data->updated_at = now();


        $data->save();
        return redirect()->route('admin_faq')->with('success','Updated FAQ');

    }

    public function destroy( $id)
    {
        $data = Faq::find($id);
        $data->delete();
        return redirect()->route('admin_faq')->with('success','Deleted FAQ');;
    }
}

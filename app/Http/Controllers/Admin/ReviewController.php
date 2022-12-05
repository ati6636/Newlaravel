<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $datalist = Review::all();
        return view ('admin.review', compact('datalist'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Review $review,$id)
    {
        $data = Review::find($id);
        return view('admin.review_edit',compact('data'));

    }

    public function edit(Review $review)
    {
        //
    }

    public function update(Request $request, Review $review,$id)
    {
        $data = Review::find($id);
        $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success', 'Review Updated');
    }

    public function destroy(Review $review,$id)
    {
        $data = Review::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Review Deleted');
    }
}

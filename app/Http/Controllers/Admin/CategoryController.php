<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $appends = [ 'getParentsTree' ];

    public static function getParentsTree($category, $title)
    {
        if($category->parent_id == 0)
        {
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }

    public function index()
    {
      $categories = Category::with('children')->get();

       return view('admin.category', compact('categories'));
    }

    public function add()
    {
        $categories = Category::with('children')->get();

        return view('admin.category_add', compact('categories'));
    }

    public function create(Request $request)
    {
        $categories = Category::create([

        'parent_id' => $request->parent_id,
        'title' => $request->title,
        'keywords' => $request->keywords,
        'description' => $request->description,
        'image' => Storage::putFile('/images/',$request->file('image')),
        'slug' => Str::slug($request->title),
        'status' => $request->status,
        'created_at' => now(),
        ]);


        $categories->save();

        return redirect()->route('admin_category');
    }

    public function edit(Category $category , $id)
    {
        $categoryEdit = Category::find($id);
        $categories = Category::with('children')->get();

        return view('admin.category_edit', compact('categoryEdit', 'categories'));
    }

    public function update(Request $request, Category $category ,$id)
    {
        $update = Category::find($id);

        $update->parent_id = $request->parent_id;
        $update->title = $request->title;
        $update->keywords = $request->keywords;
        $update->description = $request->description;
        if ($request->hasFile('image')) {
            $update->image = $request->image->storeAs('/uploads/', $request->image->getClientOriginalName());
        }
        $update->slug = Str::slug($request->title);
        $update->status = $request->status;
        $update->updated_at = now();

        $update->save();
        return redirect()->route('admin_category');
    }

    public function destroy(Category $category,$id)
    {
        $deletedCategory = Category::delete($id);
        return redirect()->route('admin_category');
    }
}

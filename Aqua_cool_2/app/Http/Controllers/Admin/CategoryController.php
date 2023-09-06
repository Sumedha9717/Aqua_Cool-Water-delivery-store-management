<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryformRequest;

class CategoryController extends Controller
{
    // -------------------------------------------------index Function-----------------------------------------------------------
    public function index()
    {
        return view('admin.category.index');
    }

    // -------------------------------------------------Create Function-----------------------------------------------------------
    public function create()
    {
        return view('admin.category.create');
    }

    // -------------------------------------------------store Function-----------------------------------------------------------
    public function store(CategoryformRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'uploads/category/';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/', $filename);

            $category->image = $uploadPath.$filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message','New Category Added Successfuly');

    }

    // -------------------------------------------------Edit Function-----------------------------------------------------------

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    // -------------------------------------------------Update Function-----------------------------------------------------------

    public function update(CategoryFormRequest $request,$category)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($category);

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'uploads/category/';

        if($request->hasFile('image'))
        {

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/category/', $filename);

            $category->image = $uploadPath.$filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/category')->with('message','Category Updated Successfuly');
    }

}
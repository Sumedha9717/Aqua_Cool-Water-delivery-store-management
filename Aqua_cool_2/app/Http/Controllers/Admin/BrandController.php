<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BrandformRequest;

class BrandController extends Controller
{
    // -------------------------------------------------index Function-----------------------------------------------------------
    public function index()
    {
        return view('admin.brands.index');
    }

    // -------------------------------------------------Create Function-----------------------------------------------------------
    public function create()
    {
        return view('admin.brands.create');
    }

    // -------------------------------------------------store Function-----------------------------------------------------------
    public function store(BrandformRequest $request)
    {
        $validatedData = $request->validated();

        $brands = new Brands;

        $brands->brand_name = $validatedData['brand_name'];
        $brands->brand_slug = Str::slug($validatedData['brand_slug']);

        if ($request->hasFile('brand_image')) {
            $file = $request->file('brand_image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/brands/', $filename);

            $brands->brand_image = $filename;
        }

        $brands->status = $request->status == true ? '1' : '0';
        $brands->save();

        return redirect('admin/brands')->with('message', 'New Brand Added Successfully');
    }

    // -------------------------------------------------Edit Function-----------------------------------------------------------

    public function edit(Brands $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }


     // -------------------------------------------------Update Function-----------------------------------------------------------
     public function update(BrandformRequest $request,$brands)
     {
         $validatedData = $request->validated();

         $brands = Brands::findOrFail($brands);

         $brands->brand_name = $validatedData['brand_name'];
         $brands->brand_slug = Str::slug($validatedData['brand_slug']);

         if($request->hasFile('brand_image'))
         {

             $path = 'uploads/brands/'.$brands->brand_image;
             if(File::exists($path))
             {
                 File::delete($path);
             }

             $file = $request->file('brand_image');

             $ext = $file->getClientOriginalExtension();
             $filename = time().'.'.$ext;

             $file->move('uploads/brands/', $filename);

             $brands->brand_image = $filename;
         }

         $brands->status = $request->status == true ? '1':'0';
         $brands->update();

         return redirect('admin/brands')->with('message','Brand Updated Successfuly');
     }
}

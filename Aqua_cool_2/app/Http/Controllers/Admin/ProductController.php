<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    // -----------------------------------------------------------index function-----------------------------------------------------
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // -----------------------------------------------------------Create function-----------------------------------------------------
    public function create()
    {
        $categories = Category::all();
        $brands = Brands::all();

        return view('admin.products.create', compact('categories','brands'));
    }

    // -----------------------------------------------------------Store function-----------------------------------------------------
    public function store(ProductFormRequest $request)
    {
      $validatedData = $request->validated();

      $category = Category::findOrFail($validatedData['category_id']);

      $product = $category->products()->create([
          'category_id' => $validatedData['category_id'],
          'name' => $validatedData['name'],
          'slug' => Str::slug($validatedData['slug']),
          'brand' => $validatedData['brand'],
          'small_description' => $validatedData['small_description'],
          'original_price' => $validatedData['original_price'],
          'selling_price' => $validatedData['selling_price'],
          'quantity' => $validatedData['quantity'],
          'trending' => $request->trending == true ? '1' : '0',
          'status' => $request->status == true ? '1' : '0',
          'meta_title' => $validatedData['meta_title'],
          'meta_keyword' => $validatedData['meta_keyword']
      ]);

      if($request->hasFile('image'))
      {

          $uploadPath = 'uploads/products/';

          $i = 1;
          foreach($request->file('image') as $imageFile)
          {
              $extension = $imageFile->getClientOriginalExtension();
              $filename = time().$i++.'.'.$extension;
              $imageFile->move($uploadPath,$filename);
              $finalImagePathName = $uploadPath.$filename;

              $product->productImages()->create([
                  'product_id' => $product->id,
                  'image' => $finalImagePathName,
              ]);
          }
      }

      return redirect('/admin/products')->with('message','New Product Addes Successfully');
    }

    // -------------------------------------------------------------Edit Function---------------------------------------------------------

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $product = Product::findOrFail($product_id);

        return view('admin.products.edit', compact('categories','brands','product'));
    }

    // -------------------------------------------------------------Update Function---------------------------------------------------------

    public function update(ProductFormRequest $request, int $product_id )
    {
        $validatedData = $request->validated();

        $product = Category::findOrFail($validatedData['category_id'])
                        ->products()->where('id',$product_id)->first();

        if($product)
        {
            $product->update([
          'category_id' => $validatedData['category_id'],
          'name' => $validatedData['name'],
          'slug' => Str::slug($validatedData['slug']),
          'brand' => $validatedData['brand'],
          'small_description' => $validatedData['small_description'],
          'original_price' => $validatedData['original_price'],
          'selling_price' => $validatedData['selling_price'],
          'quantity' => $validatedData['quantity'],
          'trending' => $request->trending == true ? '1' : '0',
          'status' => $request->status == true ? '1' : '0',
          'meta_title' => $validatedData['meta_title'],
          'meta_keyword' => $validatedData['meta_keyword']
            ]);

            if($request->hasFile('image'))
            {

                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach($request->file('image') as $imageFile)
                {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            return redirect('/admin/products')->with('message','Product Updated Succesdully');

        }
        else
        {
            return redirect('/admin/products')->with('message','No Such Product ID Found');
        }

    }

    // -----------------------------------------------------------DestroyImage Function-------------------------------------------------------------
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);

        if(File::exists($productImage->image))
        {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Deleted');
    }

    // ----------------------------------------------------------Destroy Function-------------------------------------------------------------
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);

        if($product->productImages)
        {
            foreach($product->productImages as $image)
            {
                if(File::exists($image->image))
                {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product Deleted with All its Images');
    }


}

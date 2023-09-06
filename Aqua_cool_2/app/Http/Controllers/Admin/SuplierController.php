<?php

namespace App\Http\Controllers\Admin;

use App\Models\Suplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierFormRequest;

class SuplierController extends Controller
{
    // --------------------------------------------------------Index Function--------------------------------------------------------

   public function index()
     {
        return view('admin.supplier.index');
     }

    // ----------------------------------------------------------Create Function--------------------------------------------------------

   public function create()
   {
      return view('admin.supplier.create');
   }

    // ----------------------------------------------------------Store Function--------------------------------------------------------

    public function store(SupplierFormRequest $request)
    {
        $validatedData = $request->validated();

        $supplier = new Suplier;

        $supplier->name = $validatedData['name'];
        $supplier->slug = Str::slug($validatedData['slug']);
        $supplier->city = $validatedData['city'];
        $supplier->adress = $validatedData['adress'];
        $supplier->email = $validatedData['email'];
        $supplier->phone = $validatedData['phone'];
        $supplier->description = $validatedData['description'];

        $supplier->save();

        return redirect('admin/supplier')->with('message','New Supplier Added Successfully');
    }

     // ----------------------------------------------------------Edit Function--------------------------------------------------------

    public function edit(Suplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));

    }

     // ----------------------------------------------------------Update Function--------------------------------------------------------

     public function update(SupplierFormRequest $request, $supplier )
     {

        $validatedData = $request->validated();

        $supplier = Suplier::findOrFail($supplier);

        $supplier->name = $validatedData['name'];
        $supplier->slug = Str::slug($validatedData['slug']);
        $supplier->city = $validatedData['city'];
        $supplier->adress = $validatedData['adress'];
        $supplier->email = $validatedData['email'];
        $supplier->phone = $validatedData['phone'];
        $supplier->description = $validatedData['description'];

        $supplier->update();

        return redirect('admin/supplier')->with('message','Supplier Updated Successfully');

     }


}

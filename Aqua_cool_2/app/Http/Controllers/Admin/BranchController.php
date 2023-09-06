<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BranchFormRequest;

class BranchController extends Controller
{
     // --------------------------------------------------------Index Function--------------------------------------------------------

   public function index()
   {
      return view('admin.branch.index');
   }


    // ----------------------------------------------------------Create Function--------------------------------------------------------

    public function create()
    {
       return view('admin.branch.create');
    }


     // ----------------------------------------------------------Store Function--------------------------------------------------------

     public function store(BranchFormRequest $request)
     {
         $validatedData = $request->validated();

         $branch = new Branch;

         $branch->name = $validatedData['name'];
         $branch->slug = Str::slug($validatedData['slug']);
         $branch->district = $validatedData['district'];
         $branch->city = $validatedData['city'];
         $branch->adress = $validatedData['adress'];
         $branch->email = $validatedData['email'];
         $branch->phone = $validatedData['phone'];

        //  $branch->image = $validatedData['image'];
        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move('uploads/branch/', $filename);

            $branch->image = $filename;
        }

         $branch->save();

         return redirect('admin/branch')->with('message','New Branch Added Successfully');
     }


     // ----------------------------------------------------------Edit Function--------------------------------------------------------

    public function edit(Branch $branch)
    {
        return view('admin.branch.edit', compact('branch'));

    }

     // ----------------------------------------------------------Update Function--------------------------------------------------------

     public function update(BranchFormRequest $request, $branch)
     {
        $validatedData = $request->validated();
        $branch = Branch::findOrFail($branch);

        $branch->name = $validatedData['name'];
        $branch->slug = Str::slug($validatedData['slug']);
        $branch->district = $validatedData['district'];
        $branch->city = $validatedData['city'];
        $branch->adress = $validatedData['adress'];
        $branch->email = $validatedData['email'];
        $branch->phone = $validatedData['phone'];

       if($request->hasFile('image'))
       {
           $path = 'uploads/branch/'.$branch->image;

           if(File::exists($path))
           {
            File::delete($path);
           }

           $file = $request->file('image');
           $ext = $file->getClientOriginalExtension();
           $filename = time().'.'.$ext;
           $file->move('uploads/branch/', $filename);
           $branch->image = $filename;
       }

        $branch->update();

        return redirect('admin/branch')->with('message',' Branch Updated Successfully');
     }

}

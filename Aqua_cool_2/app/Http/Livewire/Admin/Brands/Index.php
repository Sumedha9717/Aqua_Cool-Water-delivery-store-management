<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand_id;
     // ------------------------------------------------------------Delete Function------------------------------------------------------------
     public function deleteBrand($brand_id)
     {
         $this->brand_id = $brand_id;
         $this->dispatchBrowserEvent('open-delete-modal');
     }

      // ------------------------------------------------------------destroyBrands Function------------------------------------------------------------
    public function destroyBrand()
    {

        $brands = Brands::find($this->brand_id);

        $path = 'uploads/brands/'.$brands->brand_image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $brands->delete();
        session()->flash('message','Brand Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    // ----------------------------------------------------------------Render Function--------------------------------------------------------------
    public function render()
    {
        $brands = Brands::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index',['brands' => $brands]);
    }
}

<?php

namespace App\Http\Livewire\Admin\Supplier;

use App\Models\Suplier;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $suppli_id;

    // ---------------------------------------------------------------Render Function-------------------------------------------------

    public function render()
    {
        $supplier = Suplier::orderBy('id','DESC')->paginate(10);

        return view('livewire.admin.supplier.index', ['supplier' => $supplier]);
    }

    // ---------------------------------------------------------------Delete Supplier Function-------------------------------------------------

    public function deleteSupplier($suppli_id)
    {
        $this->suppli_id = $suppli_id;
    }

     // ---------------------------------------------------------------Destroy Supplier Function-------------------------------------------------

     public function destroySupplier()
     {
       $supplier = Suplier::find($this->suppli_id);

       $supplier->delete();
       session()->flash('message', 'Supplier Deleted Successfully');
       $this->dispatchBrowserEvent('close-modal');

     }


}

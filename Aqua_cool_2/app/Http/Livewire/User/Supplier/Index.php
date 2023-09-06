<?php

namespace App\Http\Livewire\User\Supplier;

use App\Models\Suplier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $suppli_id;

    // ---------------------------------------------------------------Render Function-------------------------------------------------

    public function render()
    {
        $supplier = Suplier::orderBy('id','DESC')->paginate(10);

        return view('livewire.user.supplier.index', ['supplier' => $supplier]);
    }
}

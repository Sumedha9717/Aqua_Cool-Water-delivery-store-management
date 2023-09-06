<?php

namespace App\Http\Livewire\User\Brands;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand_id;

    // ----------------------------------------------------------------Render Function--------------------------------------------------------------
    public function render()
    {
        $brands = Brands::orderBy('id','DESC')->paginate(10);
        return view('livewire.user.brands.index',['brands' => $brands]);
    }
}

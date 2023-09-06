<?php

namespace App\Http\Livewire\User\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $products, $category;

    // ----------------------------------------------------------------Mount Function---------------------------------------------------

    // public function mount($products, $category)
    // {
    //     $this->products = $products;
    //     $this->category = $category;
    // }
    public function mount($products = null, $category = null)
{
    $this->products = $products;
    $this->category = $category;
}

    // ----------------------------------------------------------------Render Function---------------------------------------------------

    public function render()
    {
        $categories = Product::orderBy('id','DESC')->paginate(10);
        return view('livewire.user.product.index', [

            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}

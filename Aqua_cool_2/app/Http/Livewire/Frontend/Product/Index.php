<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class Index extends Component
{

    public $products, $category;

    // ----------------------------------------------------------------Mount Function---------------------------------------------------

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }

    // ----------------------------------------------------------------Render Function---------------------------------------------------

    public function render()
    {
        return view('livewire.frontend.product.index', [

            'products' => $this->products,
            'category' => $this->category
        ]);
    }
}

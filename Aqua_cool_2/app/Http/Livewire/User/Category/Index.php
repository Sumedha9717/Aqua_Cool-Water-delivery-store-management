<?php

namespace App\Http\Livewire\User\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

     // ------------------------------------------------------------Render Function------------------------------------------------------------
     public function render()
     {
         $categories = Category::orderBy('id','DESC')->paginate(10);
         return view('livewire.user.category.index',['categories' => $categories]);
     }
}

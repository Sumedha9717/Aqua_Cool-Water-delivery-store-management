<?php

namespace App\Http\Livewire\User\Branch;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $branch_id;


 // ---------------------------------------------------------------Render Function-------------------------------------------------
    public function render()
    {
        $branches = Branch::orderBy('id','DESC')->paginate(10);

        return view('livewire.user.branch.index',['branches' => $branches]);
    }
}

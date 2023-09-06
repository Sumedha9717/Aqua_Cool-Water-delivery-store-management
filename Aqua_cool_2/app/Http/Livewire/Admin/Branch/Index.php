<?php

namespace App\Http\Livewire\Admin\Branch;
use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $branch_id;


 // ---------------------------------------------------------------Render Function-------------------------------------------------
    public function render()
    {
        $branches = Branch::orderBy('id','DESC')->paginate(10);

        return view('livewire.admin.branch.index',['branches' => $branches]);
    }

    // ---------------------------------------------------------------DeleteBranch Function-------------------------------------------------
    public function deleteBranch($branch_id)
    {
        $this->branch_id = $branch_id;
    }

    // ---------------------------------------------------------------destroyBranch Function-------------------------------------------------
    public function destroyBranch()
    {
        $branch = Branch::find($this->branch_id);

        $path = 'uploads/branch/'.$branch->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $branch->delete();
        session()->flash('message','Branch Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }


}

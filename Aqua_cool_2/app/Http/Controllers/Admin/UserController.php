<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ------------------------------------------------------------------Index----------------------------------------------------
    public function index()
    {
        $users = User::paginate(10);
       return view('admin.users.index',compact('users'));
    }

    // ------------------------------------------------------------------Create----------------------------------------------------
    public function create()
    {
        return view('admin.users.create');

    }

    // ------------------------------------------------------------------Store----------------------------------------------------
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
            'role_as' => ['required', 'integer'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,

        ]);

        return redirect('/admin/users')->with('message','User created successfully');

    }


    // ------------------------------------------------------------------Edit----------------------------------------------------
    public function edit(int $userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.edit',compact('user'));
    }


    // ------------------------------------------------------------------Update----------------------------------------------------
    public function update(Request $request, int $userId)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', ],
            'role_as' => ['required', 'integer'],
        ]);

        User::findOrFail($userId)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,

        ]);

        return redirect('/admin/users')->with('message','User Updated successfully');
    }

    // ------------------------------------------------------------------Destroy----------------------------------------------------
    public function destroy(int $userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('/admin/users')->with('message','User Deleted successfully');

    }


    // ------------------------------------------------------------------Password Create----------------------------------------------------
    public function passwordCreate()
    {
       return view('frontend.users.change-password');
    }


    // ------------------------------------------------------------------Change Password ----------------------------------------------------
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }

    }
}

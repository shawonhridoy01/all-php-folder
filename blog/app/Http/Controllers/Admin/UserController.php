<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.user',compact('users'));
    }

    // edit form
    public function edit($id)
    {

        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    // form update logic

    public function editSubmit(Request $request,$id){
            $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email',
            'role_as' => 'required',
        ]);

        $user = new User();



        if($user){
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/user/user')->with('user_updated','User Role Has been Updated ');
        }

        return redirect('admin/user/user')->with('user_updated','User Not Found ');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::get();
        $addresss = address::get();


        return view('index',compact('addresss'));
    }

    public function create(){
        $add = address::all();
        return view('create',compact('add'));
    }


    public function store(Request $request){
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        if($user){
            return redirect('user');
        }
    }




}

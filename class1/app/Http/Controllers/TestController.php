<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('welcome')->exists() ? 'welcome' : abort('404');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('backend.post.post',compact('posts','categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('backend.post.create',compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            "title" => "required|max:255|min:30",
            "sub_title" => "required|min:30|max:255",
            "description" => "required|min:30|max:200",
            "thumbnail" => "required|image",
            "category_name" => "required",
            "author" => "required",
        ]);


        if($request->thumbnail){
            $mainfile = $request->thumbnail;
            $destinationPath = 'uploads';
            $orgianalFile = time().$mainfile->getClientOriginalName() ;
            $mainValue = $mainfile->move($destinationPath,$orgianalFile);


        }



        $posts = Post::create([

            'title' => $request->title,
            'sub_title' => $request->title,
            'description' => $request->title,
            'thumbnail' =>$mainValue,
            'slug' =>$request->title,
            'category_name' => $request->category_name,
            'author' => $request->author,

        ]);

        return redirect('post')->with('success_message', "Your Data Has Been Inserted");
    }


    public function show($id){
        $post = Post::find($id);
        return view('backend.post.show',compact('post'));
    }


    // post edit form  view

    public function edit($id){
        $post = Post::find($id);
        return view('backend.post.edit',compact('post'));
    }
}


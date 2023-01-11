<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.post',compact('posts'));
    }


    // create form
    public function create(){
        $categories = Category::where('status','=','0')->get();
        return view('admin.post.create',compact('categories'));
    }

        // store function


        public function store(Request $request){
            // validation of form

            $request->validate([
                "category_id" => 'required',
                "name" => 'required|max:100|string',
                "slug" => 'required|max:200|string',
                "yt_iframe" => 'required',
                "meta_title" => 'required|max:200|string',
                "meta_description" => 'required|max:1000|string',
                "meta_keyword" => 'required|max:1000|string',
            ]);




            $post = new Post();




            $post->category_id = $request->category_id;
            $post->name = $request->name;
            $post->slug = Str::slug($request->slug);
            $post->description = $request->description;
            $post->yt_iframe = $request->yt_iframe;


            $post->meta_title = $request->meta_title;
            $post->meta_description = $request->meta_description;
            $post->meta_keyword = $request->meta_keyword;
            $post->status = $request->status == true ? '1' : "0";
            $post->created_by = Auth::user()->id;

            $post->save();
            return redirect('admin/post')->with('post_added',"Post Has Been Added Successfully");


        }


            // edit form

    public function edit($id)
    {
        $categories = Category::where('status','=','0')->get();
        $post = Post::find($id);
        return view('admin.post.edit',compact('post','categories'));
    }



        // form data update



        public function editSubmit(Request $request,$id){
            // validation of form


            $request->validate([
                "category_id" => 'required',
                "name" => 'required|max:50|string',
                "slug" => 'required|max:200|string',
                // "yt_iframe" => 'required',
                "meta_title" => 'required|max:200|string',
                "meta_description" => 'required|max:1000|string',
                "meta_keyword" => 'required|max:1000|string',
            ]);




            $post = Post::find($id);


            $post->category_id = $request->category_id;
            $post->name = $request->name;

            $post->slug = Str::slug($request->slug);
            $post->description = $request->description;

            $post->meta_title = $request->meta_title;
            $post->meta_description = $request->meta_description;
            $post->meta_keyword = $request->meta_keyword;

            $post->status = $request->status == true ? '1' : "0";
            $post->created_by = Auth::user()->id;

            $post->save();
            return redirect('admin/post')->with('post_added',"Category Has Been Update Successfully");
        }






}

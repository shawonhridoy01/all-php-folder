<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $categories = Category::where('status','0')->get();
        $posts = Post::where('status','0')->orderby('created_at','desc')->get()->take(15);
        return view('frontend.index',compact('categories','posts'));
    }


    public function viewCategory($category_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();

        if($category){
            $posts = Post::where('category_id',$category->id)->where('status','0')->paginate(1);
            return view('frontend.show-category',compact('posts','category'));

        }else{
            return redirect('/');
        }


        // return view('frontend.show-category');
    }


    public function viewPost($category_slug,$post_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latestposts = Post::where('category_id',$category->id)->where('status','0')->orderBy('created_by','DESC')->get()->take(14);
            return view('frontend.show-post',compact('post','latestposts'));
        }else{
            return redirect('/');
        }
    }
}

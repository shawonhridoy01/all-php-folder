<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function store(Request $request){
        if(Auth::check()){
            // validation of form

            $request->validate([

                "comment_body" => 'required|max:500|string',

            ]);

            $post = Post::where('slug',$request->comment_slug)->where('status','0')->first();
            if($post){
                Comment::create([
                    "post_id" => $post->id,
                    "user_id" => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with("success_comment","Commented Successfully");
            }else{

                return redirect()->back()->with("message","No Such Post Found");
            }
        }else{
            return redirect('login')->with("message","Please Login First to Comment");
        }
    }
}

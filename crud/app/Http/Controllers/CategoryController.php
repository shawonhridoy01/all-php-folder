<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


    // index method is for show data
    public function index(){
        $categories = Category::all();
        return view('backend.category.category',compact('categories'));
    }


    // showing create form
    public function create(){
        return view('backend.category.create');
    }

    // login of data store
    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:30|unique:categories',
            'status' => 'required'

        ]);









        $result = Category::create(
            [
                'name' => $request->name,
                'status' => $request->status,

            ]
        );

        if($result){
            return redirect('/category')->with('success_message',"Your Data Has Been Successfully Inserted");
        }else{
            return back()->with('error_message',"Data Insertion Failed");
        }


    }


    // show single data
    public function show($id){
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
    }

    // edit form
    public function edit($id){
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    // edit submit

    public  function editSubmit(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:30|unique:categories',
            'status' => 'required'

        ]);

        $result = Category::find($id)->update([
            'name' => $request->name,
            'status' => $request->status,

        ]);


        if($result){
            return redirect('/category')->with('success_message',"Your Data Has Been Successfully Updated");
        }else{
            return back()->with('error_message',"Data Update Failed");
        }
    }


    // delete function
    public function delete($id){
        $result = Category::find($id)->delete();

        if($result){
            return redirect('/category')->with('delete_message',"Your Data Has Been Successfully Deleted");
        }else{
            return back()->with('delete_message',"Data Delete Failed");
        }

    }




    // public static function fileUploadFunction($destinationPath,$mainFile){
    //     $orginalName = $mainFile->getClientOriginalName();
    //     $randomName = time().$orginalName;
    //     $mainFile->move($destinationPath, public_path('files').$randomName);
    // }






}

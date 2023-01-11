<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    // store function



    public function store(Request $request){
        // validation of form
        $request->validate([
            "name" => 'required|max:50|string',
            "slug" => 'required|max:200|string',
            "description" => 'required|max:1000|string',
            "image" => 'required|image',
            "meta_title" => 'required|max:200|string',
            "meta_description" => 'required|max:1000|string',
            "meta_keyword" => 'required|max:1000|string',
            // "navbar_status" => 'nullable|boolean',
            // "status" => 'nullable|boolean',
            // "created_by" => 'required'
        ]);



        $category = new Category();


        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $randomFile = time() . $file->getClientOriginalName();
            $file->move('uploads/category',$randomFile);
            $category->image = $randomFile;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $request->navbar_status == true ? '1' : "0";
        $category->status = $request->status == true ? '1' : "0";
        $category->created_by = Auth::user()->id;

        $category->save();
        return redirect('admin/category')->with('category_added',"Category Has Been Added Successfully");


    }


    // edit form

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    // form data update



    public function editSubmit(Request $request,$id){
        // validation of form
        $request->validate([
            "name" => 'required|max:50|string',
            "slug" => 'required|max:200|string',
            "description" => 'required|max:1000|string',
            "image" => 'required|image',
            "meta_title" => 'required|max:200|string',
            "meta_description" => 'required|max:1000|string',
            "meta_keyword" => 'required|max:1000|string',
            // "navbar_status" => 'nullable|boolean',
            // "status" => 'nullable|boolean',
            // "created_by" => 'required'
        ]);



        $category = Category::find($id);
    


        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        if($request->hasFile('image')){
            $destination = 'uploads/category/'.$category->image;

            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $randomFile = time() . $file->getClientOriginalName();
            $file->move('uploads/category',$randomFile);
            $category->image = $randomFile;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->navbar_status = $request->navbar_status == true ? '1' : "0";
        $category->status = $request->status == true ? '1' : "0";
        $category->created_by = Auth::user()->id;

        $category->save();
        return redirect('admin/category')->with('category_added',"Category Has Been Update Successfully");
    }



    // delete category

    public function delete($id)
    {
        $category = Category::find($id);


        $destination = 'uploads/category/'.$category->image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $category->delete();
        // $category->posts->delete()->first();
        return redirect('admin/category')->with('category_delete',"Once deleted, you will not be able to recover this imaginary file!");


    }




}

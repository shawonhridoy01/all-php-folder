<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{

    public function index(){

        return view('image');
    }
    public function fileupload(){
        return view('fileup');


    }


    public function fileuploadSubmit(Request $request){
        $request->validate([
            'user_img' => 'required|image'
        ]);

        if($request->hasFile('user_img')){
            // $destinationPath = 'uploads';
            // $mainFile = $request->file('user_img');
            self::fileUploadFunction('upload/post',$request->file('user_img'));
            return back();

        };
    }



    public static function fileUploadFunction($destinationPath,$mainFile){
        $orginalName = $mainFile->getClientOriginalName();
        $randomName = time().$orginalName;
        $mainFile->move($destinationPath,$randomName);
    }








}

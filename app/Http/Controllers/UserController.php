<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function ImageUpload(){

        return view('manage-posts');

    }

    public function ImageUploadStore(Request $request){

        $request->validate([
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request -> image -> move(public_path('images'), $imageName);

        return back()->with('success', 'Image uploaded')->with('image',$imageName);
    }
}

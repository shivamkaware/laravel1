<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store( Request $request){
       $data = new  Blog();
       $data ->name=$request->name;
       $data ->status=$request->status;

       if($request->hasFile('image')){
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads_image',$filename);
        $data->image = $filename;

    }

       $data->save();
       return redirect()->route('index');

    }

    public function index(){
        $data = Blog::all();
        return view('table',compact('data'));
    }

    public function edit($id){
    $data = Blog::find($id);
    return view('edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data =   Blog::find($id);
        $data ->name=$request->name;
        $data ->status=$request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads_image',$filename);
            $data->image = $filename;

        }
        $data->save();
        return redirect()->route('index');
    }

    public function delete($id){
        $data =   Blog::find($id);
        $data->delete();
        return redirect()->route('index');

    }

   
}

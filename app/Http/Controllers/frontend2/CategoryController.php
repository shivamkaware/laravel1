<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('admin.category.create');
    }

    public function store( Request $request){
       $data = new  Category();
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
       return redirect()->route('category.index')->with('message','Add successfully');

    }

    public function index(){
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }

    public function edit($id){
    $data = Category::find($id);
    return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $data =   Category::find($id);
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
        return redirect()->route('category.index')->with('message','update successfully');
    }

    public function delete($id){
        $data =   Category::find($id);
        $data->delete();
        return redirect()->route('category.index')->with('warning','delete successfully');

    }

}

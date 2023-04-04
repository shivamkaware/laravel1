<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function create(){
        $data= Category::all();
        return view('admin.product.create',compact('data'));
    }

    public function store( Request $request){
       $data = new  Products();
       $data ->title=$request->title;
       $data ->description=$request->description;
       $data ->category=$request->category;

       if($request->hasFile('image')){
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $filename = time().'.'.$extention;
        $file->move('uploads_image',$filename);
        $data->image = $filename;

    }

       $data->save();
       return redirect()->route('product.index')->with('message','added successfully');

    }

    public function index(){
        $data = Products::all();
        $category=Category::all();

        return view('admin.product.index',compact('data','category'));
    }



    public function update(Request $request,$id){
        $data =  Products::find($id);
        $data ->title=$request->title;
        $data ->category=$request->category;
        $data ->description=$request->description;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads_image',$filename);
            $data->image = $filename;

        }
        $data->save();
        return redirect()->route('product.index')->with('message','update successfully');
    }

    public function delete($id){
        $data =  Products::find($id);
        $data->delete();

        return redirect()->route('product.index')->with('warning','delete successfully');

    }
    public function edit($id){

        $category=Category::all();
        $data =Products::with('category')->find($id);
        // dd($data);
        return view('admin.product.edit',compact('data','category'));
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\User;
use App\Models\Products;

class BrandController extends Controller
{
    public function create(){
        $user=User::all();
        $product=Products::all();
        return view('admin.Brand.create',compact('user','product'));
    }

    public function store( Request $request){
       $data = new  Brand();
       $data ->name=$request->name;
       $data ->product_id=$request->product_id;
       $data ->user_id=$request->user_id;
      $data->save();
       return redirect()->route('brand.index')->with('message','update successfully');

    }

    public function index(){
        $data = Brand::with('user','products')->get();
        // dd($data[0]->user[0]->name);
        // dd($data[0]->product[0]->title);
    //   echo $data;
        //  dd($data);
        return view('admin.brand.index',compact('data'));
    }

    public function edit($id){
        $data = Brand::with('user','products')->find($id);
        $products= Products::all();
        $users=User::all();
    //    dd($users);
      return view('admin.brand.edit',compact('data','users','products'));
    }

    public function update(Request $request,$id){
        $data =   Brand::find($id);
        $data ->name=$request->name;
        $data ->product_id=$request->product_id;
       $data ->user_id=$request->user_id;

        $data->save();
        return redirect()->route('brand.index')->with('message','update successfully');
    }

    public function delete($id){
        $data =   Brand::find($id);
        $data->delete();
        return redirect()->route('brand.index')->with('warning','delete successfully');

    }

    public function review(){
        $data=Brand::all();
        $user=User::all();
        $product=Products::all();
        // dd($data);
        return view('admin.review.index',compact('data','user','product'));
    }


}

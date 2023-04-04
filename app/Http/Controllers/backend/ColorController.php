<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\User;
use App\Models\Products;

class ColorController extends Controller
{
    public function create(){
        $data=Color::all();
        // $user=User::all();
        // $product=Products::all();
        return view('admin.color.create',compact('data'));
    }

    public function store( Request $request){
       $data = new  Color();
       $data ->name=$request->name;
       $data ->product_id=$request->product_id;
       $data ->user_id=$request->user_id;
      $data->save();
       return redirect()->route('color.index')->with('message','Add successfully');

    }

    public function index(){
        $data = Color::with('user','product')->get();


        // dd($data);
        return view('admin.color.index',compact('data'));
    }

    public function edit($id){
        $data = Color::with('user','product')->find($id);
   $user=User::all();
   $products=Products::all();
    // $data = Color::with('user','product')->find($id);

    return view('admin.color.edit',compact('data','user','products'));
    }

    public function update(Request $request,$id){
        $data =   Color::find($id);
        $data ->name=$request->name;
        $data ->product_id=$request->product_id;
       $data ->user_id=$request->user_id;

        $data->save();
        return redirect()->route('color.index')->with('message','update successfully');
    }

    public function delete($id){
        $data = Color::find($id);
        $data->delete();
        return redirect()->route('color.index')->with('warning','update successfully');

    }
}


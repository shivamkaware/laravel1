<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store( Request $request){
       $data = new  User();
       $data ->name=$request->name;
       $data ->status=$request->status;
       $data->save();

    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;

class OrderController extends Controller
{
    public function index(){
        $data = Order::with('users','products')->get();
    //  dd($data);
      return view('admin.order.index',compact('data'));
    }
}

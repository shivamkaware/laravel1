@extends('admin.layouts.master')
@section('page')
    Brand Edit / {{$data->id}}
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Brand </li>
    <li class="breadcrumb-item active">Edit </li>
@endsection
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('brand.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control"name="name" placeholder="Enter name" value="{{$data->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">User_id</label>
                                        <select name="user_id" class="form-control" value={{$data->user_id}}>

                                            @foreach ($users as $user )
                                            {{--user_id is a column name in btand table--}}
                                            <option value="{{$user->id}}" @if($user->id==$data->user_id) selected='selected' @endif >{{$user->name}}</option>
                                            {{-- <option value="{{$users->id}}" selected='selected' >{{$users->name}}</option> --}}
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Product_id</label>
                                        <select name="product_id" class="form-control" >
                                            @foreach ($products as $product )
                                            <option value="{{$product->id}}" @if($product->id==$data->product_id) selected='selected' @endif >{{$product->title}}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
@endsection



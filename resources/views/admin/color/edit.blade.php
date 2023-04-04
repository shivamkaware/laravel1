
@extends('admin.layouts.master')
@section('page')
    Color Edit / {{$data->id}}
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Color </li>
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
                            <form action="{{ route('color.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control"name="name" placeholder="Enter name" value="{{$data->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">User_id</label>
                                        <select name="user_id" class="form-control" >
                                            @foreach ($user as $user )
                {{-- <option value="{{$c->id}}"@if($c->id==$data->category->id) selected='selected'@endif>{{$c->id}}</option> --}}

                                            <option value="{{$user->id}}" selected='selected' >{{$user->id}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Product_id</label>
                                        <select name="product_id" class="form-control" >
                                            @foreach ($product as $pro )
                                            <option value="{{$pro->id}}" selected='selected'>{{$pro->title}}</option>
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



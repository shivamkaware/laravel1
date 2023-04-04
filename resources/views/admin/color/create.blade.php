@extends('admin.layouts.master')
@section('page')
    Color Add
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Color </li>
    <li class="breadcrumb-item active">ADD </li>
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
                            <form action="{{route('color.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">User_id</label>
                                        <select name="user_id" class="form-control" required>
                                            @foreach ($user as $user )
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Product_id</label>
                                        <select name="product_id" class="form-control" required>
                                            @foreach ($product as $pro )
                                            <option value="{{$pro->id}}">{{$pro->id}}</option>
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

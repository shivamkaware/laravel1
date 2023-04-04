@extends('admin.layouts.master')
@section('page')
    Order
@endsection
@section('page')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Order Table </li>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal"> NEW</button></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>shipping address</th>
                                        <th>order no</th>
                                        <th>payment status</th>
                                        <th>payment methode</th>
                                       <th>status</th>
                                        <th>deliver at (timestamp)</th>


                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($data as $data )

                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->users->name}}</td>
                                        <td>
                                        @foreach ( $data->products as $pro )
                                             {{$pro->title}}
                                        @endforeach
                                      </td>
                                        <td>{{$data->shipping_address}}</td>
                                        <td>{{$data->order_no}}</td>
                                        <td>{{$data->payment_status}}</td>
                                        <td>{{$data->payment_method}}</td>
                                        <td>{{$data->status}}</td>
                                        <td>{{$data->delivered_at}}</td>
                                        {{-- <td>
                                            <a href=""><button class="btn btn-primary">Edit</button></a>
                                            <a href=""><button class="btn btn-danger">delete</button></a>
                                        </td> --}}
                                    </tr>

                                    @endforeach



                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

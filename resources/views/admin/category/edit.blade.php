@extends('admin.layouts.master')
@section('page')
Category / Edit / {{$data->id}}
@endsection
@section('name')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Category </li>
<li class="breadcrumb-item active">EDIT </li>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control"name="name" placeholder="Enter name" value="{{$data->name}}">
                  </div>
                  <div class="form-group">
                    <label for="status">status</label>
                    <select name="status"  class="form-control" value={{$data->status}} >
                        @if($data->status==0)
                    <option value="0">Active</option>
                     @else
                    <option value="1">Deactive</option>
                    </select>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="image"> Image</label>

                    <input type="file"  id="image" name="image" class="form-control" value="{{$data->image}}">
                    <img src="{{asset('uploads_image/'.$data->image)}}" width="10px" height="10px">
                    <div id="thumb-output" ></div>

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

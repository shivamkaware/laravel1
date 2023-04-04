@extends('admin.layouts.master')
@section('page')
    Products Data
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products </li>
    <li class="breadcrumb-item active">Table </li>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            {{-- error message --}}

            @if(session()->has('warning'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{ session()->get('warning') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
            </div>
             @endif
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ session()->get('message') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
            </div>
             @endif


        {{-- error message ends --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> <a href="{{route('product.create')}}"><button class="btn btn-primary"> NEW</button></a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>

             @foreach ($data as $data )
             <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->title}}</td>
                <td>{!! Str::words($data->description,5,'...')!!}</td>
                <td>{{$data->category}}</td>

                <td>
                    @if (empty($data->image))
                    <img src="{{asset('download.png')}}" width="50px" height="50px">
                    @else
                    <img src="{{asset('uploads_image/'.$data->image)}}" width="100px" height="100px">
                    @endif
                </td>
                <td>
                    <a href="{{route('product.edit',$data->id)}}"><button class="btn btn-primary " >Edit</button></a>
                    <a href="{{route('product.delete',$data->id)}}"><button class="btn btn-danger">delete</button></a>
                </td>
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
  {{-- <button type="button" class="btn btn-success toastsDefaultSuccess" onclick="#toastsDefaultSuccess">
    Launch Success Toast
  </button> --}}
  <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "pageLength": 2,
            searching:true
        });

    } );

      </script>
      {{-- <script>

   $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
   </script> --}}
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endsection

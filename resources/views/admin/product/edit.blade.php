@extends('admin.layouts.master')
@section('page')
    Products Edit /{{$data->id}}
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products </li>
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
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('product.update',$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter name" value="{{$data->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">description</label><br>
                                    <textarea name="description" id="editor" cols="70 " rows="5" class="form-control">{{$data->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">category</label>
                                    <select name="category" class="form-control" >
                                        @foreach ($category as $c )
                                        {{-- <option value="{{$c->id}}"@if($c->id==$data->category->id) selected='selected'@endif>{{$c->id}}</option> --}}
                                        <option value="{{@$c->id}}" selected='selected' >{{@$c->id}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image"> Image</label>

                                    <input type="file" id="image" name="image" class="form-control" value="{{asset('uploads_image/',$data->image)}}">
                                    <img src="{{asset('uplodas_image/'.$data->image)}}" height="" alt="">
                                    <div id="thumb-output"></div>

                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!-- /.card-body -->


                        </form>
                    </div>


                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    {{-- @include('admin.product.modal') --}}
    <!-- /.content -->
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection

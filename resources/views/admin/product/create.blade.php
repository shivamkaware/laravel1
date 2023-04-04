@extends('admin.layouts.master')
@section('page')
    Products Add
@endsection
@section('name')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Products </li>
    <li class="breadcrumb-item active">ADD </li>
@endsection
@section('content')
<div class="container">
    <!-- Content Header (Page header) -->
    {{-- <button type="button" class="btn btn-success toastsDefaultSuccess" id="error">
        Launch Success Toast
      </button> --}}

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
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">description</label><br>
                                    <textarea name="description" id="editor" cols="70 " rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">category</label>
                                    <select name="category" class="form-control" required>
                                        @foreach ($data as $data )
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image"> Image</label>
                                    <input type="file" id="imageUpload" name="image" onchange="previewImage()" class="form-control" required>

                                    {{-- <input type="file" id="imagePreview" name="image" class="form-control"> --}}
                                    <div id="thumb-output"></div>

                                </div>
                                <button type="submit" class="btn btn-primary" class="btn btn-success toastsDefaultSuccess" id="error" >Submit</button>
                            </div>
                            <!-- /.card-body -->


                        </form>
                    </div>


                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>

<script>

function previewImage() {
  var preview = document.querySelector('#imagePreview');
  var file = document.querySelector('#imageUpload').files[0];
  var reader = new FileReader();

  reader.onloadend = function() {
    preview.src = reader.result;
    preview.style.display = "block";
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
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

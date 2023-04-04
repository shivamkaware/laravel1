@extends('admin.layouts.master')
@section('page')
Review
@endsection
@section('name')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item active">review </li>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> NEW</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Product</th>
                  <th>Review</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href=""><button class="btn btn-primary">Edit</button></a>
                            <a href=""><button class="btn btn-danger">delete</button></a>
                        </td>
                      </tr>

                  


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
 <!-- Button trigger modal -->


  <!-- Modal -->


  <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "pageLength": 2,
            searching:true
        });

    } );
      </script>
      {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> --}}
      <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endsection


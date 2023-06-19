
@extends('layout')
@section('content')
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Add Category
              <a href="{{url('admin/category')}}" class="float-right btn btn-sm btn-dark">All Data</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if($errors)
                  @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                  @endforeach
                @endif

                @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
                @endif

                <form method="post" action="{{url('admin/category')}}" enctype="multipart/form-data">
                  @csrf
                  <!-- <table class="table table-bordered">
                      <tr>
                          <th>Title</th>
                          <td><input type="text" name="title" class="form-control" /></td>
                      </tr>
                      <tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" />
                          </td>
                      </tr>
                  </table> -->
                  <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="title" class="form-control" placeholder="Category name"required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Slug*</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Category slug" required />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary"/>

                    </div>
                </form>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection


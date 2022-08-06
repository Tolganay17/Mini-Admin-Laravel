@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          @if(session('status'))
          <h6 class="alert alert-success">{{session('status')}}</h6>
          @endif
          <h1 class="m-0">ADD NEWS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Add News</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
       <form method="POST" action="{{ route('admin.blogs.store')}}" enctype="multipart/form-data">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control">
              </div>
              <div class="form-group mb-3">
                <label for="">Image</label>
                <input type="file" name="news_image" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-info" value="save">
        </div>
       
       
       </form>
    </div>
  </section>
@endsection
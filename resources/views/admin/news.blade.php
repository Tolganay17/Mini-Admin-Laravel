@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">NEWS</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">News</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
        <p>
            <a href="{{ route('admin.blogs.create')}}" class="btn btn-primary"> Add news</a>
        </p>
        <table class="table table-bordered table-striped">

            <tr>
                <th>IMAGE</th>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
                <th>ACTION</th>
            </tr>
            @foreach($posts as $p)
            
            <tr>
                <td>
                  <img src="{{ asset('uploads/'.$p->news_image)}}" width="70px" height="70px" alt="image">
                </td>
                <td>{{$p->id}}</td>
                <td>{{$p->title}}</td>
                <td>{{$p->description}}</td>
                
                <td> <a href="{{ route('admin.blogs.edit',$p->id) }}" class="btn btn-info">Edit</a>   
                </td>
                <td>
                  <form action="{{ route('admin.blogs.destroy',$p->id)}}" method='POST'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('DELETE')
                    <button type='submit' class="btn btn-danger btn-sm">DELETE</button>

                  </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{$posts->render()}}
        <style>
            .w-5{
                display:none;
            }
            </style>
    </div>
  </section>
@endsection
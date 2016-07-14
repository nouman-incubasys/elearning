@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Blog</div>
                <a role="button" class="btn btn-primary btn-block" href="{{ url('admin/blog/create') }}">Add Blog</a>
            </div>
        </div>
       @if(isset($blog) && !empty($blog)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>title</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Blog</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['title']}}</td>
                    <td><img src="{{$row['blog_icon']}}" width="50" height="50"></td>
                    <td>{{$row['category_id']}}</td>
                    <td>{{$row['content']}}</td>
                    <td><a style="color:green;" href="{{ url('admin/blog/'.$row['id'].'/edit') }}">Edit</a> | <a href="{{ url('admin/delete_blog/'.$row['id']) }}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Blog Category</div>
                <a role="button" class="btn btn-primary btn-block" href="{{ url('admin/blogcategory/create') }}">Add Blog Category</a>
            </div>
        </div>
       @if(isset($blog_category) && !empty($blog_category)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blog_category as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['category']}}</td>
                    <td><a style="color:green;" href="{{ url('admin/blogcategory/'.$row['id'].'/edit') }}">Edit</a> | <a href="{{ url('admin/delete_blog_category/'.$row['id']) }}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
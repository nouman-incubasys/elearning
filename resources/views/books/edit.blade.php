@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Books Here</div>
            </div>
        </div>
        <form action="{{ url('admin/updatebooks/'.$book['id']) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Book Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" value="{{$book['title']}}" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="author">Author</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="author" value="{{$book['author']}}" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="version">Version</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="version" value="{{$book['version']}}" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cover">Book Cover</label>
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" name="file_icon"  value="{{$book['file_icon']}}">
                        <a href="/uploads/{{$book['file_icon']}}" download><img style="height:268px; width:364px;" src="/uploads/{{$book['file_icon']}}"></a>
                    </div>
                </div>
                
                <div class="form-group"> 
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Update">
                    </div>
                </div>

        </form>
    </div>

@endsection
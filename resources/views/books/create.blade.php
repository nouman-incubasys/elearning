@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Books Here</div>
            </div>
        </div>
        
        <form action="elearning/public/admin/books" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Book Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="author">Author</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="author" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="version">Version</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="version" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cover">Book Cover</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="file_icon" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="book">Upload Book</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="book" required>
                    </div>
                </div>
                
                <div class="form-group"> 
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Save">
                    </div>
                </div>

        </form>
    </div>

@endsection
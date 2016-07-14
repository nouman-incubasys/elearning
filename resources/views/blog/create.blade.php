@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blog</div>
            </div>
        </div>
        
        <form action="{{ url('admin/blog') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Blog Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="blog_title" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cat">Blog Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="blog_category" required>
                            <option value="">Select Category</option>
                            <?php
                            foreach($blog_category as $row){
                            ?>
                            <option value="{{$row['id']}}">{{$row['category']}}</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Blog Content</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="blog_content" required></textarea>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Blog Icon</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="blog_icon" required>
                    </div>
                </div>
                
                <div class="form-group"> 
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Save">
                    </div>
                </div>

        </form>
    </div>
</div>

@endsection
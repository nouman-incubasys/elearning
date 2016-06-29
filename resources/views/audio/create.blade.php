@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Audio</div>
            </div>
        </div>
        
        <form action="{{ url('admin/audio') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="title">Audio Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Audio Speaker</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="vocalist" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Audio Category</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="category" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Album Art</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="album_art" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cover">Audio File Upload</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="audio_file" required>
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
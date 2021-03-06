@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Settings</div>
            </div>
        </div>
        
        <form action="/settings" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Add Channel Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="type" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Add Channel Id</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="channel" required>
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
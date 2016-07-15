@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Instagram Settings</div>
            </div>
        </div>
        
        <form action="{{ url('admin/instagram') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Instagram Account Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="account_name" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Add Client Id</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="client_id" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Add Client Secret</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="client_secret" required>
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
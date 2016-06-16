@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Daily Devotion</div>
            </div>
        </div>
        
        <form action="/dailyprayer/edit/{{$dailyprayer['id']}}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Qoute</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="prayer" value="{{$dailyprayer['prayer']}}" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="verse">Verse</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="verse" value="{{$dailyprayer['verse']}}" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="Reference">Reference</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="reference" value="{{$dailyprayer['reference']}}" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="Content">Content</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" name="content" required>{{$dailyprayer['content']}}</textarea>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="Quote">Date For Quote</label>
                    <div class="col-sm-4">
                        <input type="date" id="datepicker" class="form-control" name="prayer_date" value="{{$dailyprayer['prayer_date']}}" required>
                    </div>
                </div>

                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cover">Image</label>
                    <div class="col-sm-4">
                        <img src="/uploads/{{$dailyprayer['prayer_icon']}}" style="height: 200px;width: 200px;">
                        <!--<input type="file" class="form-control" name="prayer_icon" required>-->
                    </div>
                </div>
                
                <div class="form-group"> 
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Update">
                    </div>
                </div>

        </form>
    </div>
</div>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
@endsection
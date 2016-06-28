@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Banner</div>
                <a role="button" class="btn btn-primary btn-block" href="{{ url('admin/banner/create') }}">Add Banner</a>
            </div>
        </div>
       @if(isset($banner) && !empty($banner)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banner as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td><img src="{{$row['link']}}" style="height: 150px; width: 200px;"></td>
                    <td><a href="{{ url('admin/delete_banner/'.$row['id']) }}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
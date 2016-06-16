@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                <a role="button" class="btn btn-primary btn-block" href="settings/create">Add Channels</a>
            </div>
        </div>
       @if(isset($settings) && !empty($settings)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Type</th>
                    <th>Channel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($settings as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['type']}}</td>
                    <td>{{$row['channel_id']}}</td>
                    <td><a style="color:green;" href="settings/{{$row['id']}}/edit/">Edit</a> | <a href="delete_settings/{{$row['id']}}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
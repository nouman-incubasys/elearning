@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>
                @if(empty($instagram))
                <a role="button" class="btn btn-primary btn-block" href="{{ url('admin/instagram/create') }}">Add Instagram Channel</a>
                @else
                <a role="button" class="btn btn-info btn-block" href="https://api.instagram.com/oauth/authorize/?client_id={{$instagram[0]['client_id']}}&redirect_uri={{url('admin/instagram/response')}}&response_type=code">Generate Access Token</a>
                @endif
            </div>
        </div>
       @if(isset($instagram) && !empty($instagram)) 
       
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Account Name</th>
                    <th>Client Id</th>
                    <th>Client Secret</th>
                    <th>Access Token</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instagram as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['account_name']}}</td>
                    <td>{{$row['client_id']}}</td>
                    <td>{{$row['client_secret']}}</td>
                    <td>{{$row['access_token']}}</td>
                    <td><a style="color:green;" href="{{ url('admin/instagram/'.$row['id'].'/edit') }}">Edit</a> | <a href="{{ url('admin/delete_insta_settings/'.$row['id']) }}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
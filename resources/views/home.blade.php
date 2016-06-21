@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! 
                    <p>Welcome {{Auth::user()->usergroups_id}}</p>
                </div>
                <div class="list-group">
                    <a href="/admin/books" class="list-group-item">Books</a>
                    <a href="/admin/dailyprayer" class="list-group-item">Daily Prayer</a>
                    <a href="#" class="list-group-item">Users</a>
                    <a href="#" class="list-group-item">Donation</a>
                    <a href="#" class="list-group-item">Live Streaming</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                @if(Auth::check())
                <div class="panel-body">
                    You are logged in! 
                    <p>Welcome {{Auth::user()->usergroups_id}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

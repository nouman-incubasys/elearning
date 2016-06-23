@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Daily Devotion</div>
                <a role="button" class="btn btn-primary btn-block" href="{{ url('admin/dailyprayer/create') }}">Add Devotion</a>
            </div>
        </div>
       @if(isset($dailyprayer) && !empty($dailyprayer)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Quotation</th>
                    <th>Verse</th>
                    <th>Prayer Icon</th>
                    <th>Reference</th>
                    <th>Content</th>
                    <th>Date For Quote</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyprayer as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['prayer']}}</td>
                    <td>{{$row['verse']}}</td>
                    <td><img src="{{$row['prayer_icon']}}" style="width: 100px;height: 100px;"></td>
                    <td>{{$row['reference']}}</td>
                    <td>{{$row['content']}}</td>
                    <td>
                        @if($row['prayer_date']!='0000-00-00')
                            {{$row['prayer_date']}}
                        @endif
                    </td>
                    <td><a style="color:green;" href="{{ url('admin/dailyprayer/'.$row['id'].'/edit/')}}">Edit</a> | <a href="{{ url('admin/delete_prayer/'.$row['id'])}}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
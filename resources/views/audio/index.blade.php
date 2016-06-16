@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Audio</div>
                <a role="button" class="btn btn-primary btn-block" href="audio/create">Add Audio</a>
            </div>
        </div>
       @if(isset($audio) && !empty($audio)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Title</th>
                    <th>Vocalist</th>
                    <th>Audio File</th>
                    <th>File Download</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audio as $key=>$row)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$row['title']}}</td>
                    <td>{{$row['vocalist']}}</td>
                    <td>
                        <audio controls>
                            <source src="/uploads/audio/{{$row['audio_file']}}" type="audio/mpeg">
                            <source src="/uploads/audio/{{$row['audio_file']}}" type="audio/ogg">
                            <source src="/uploads/audio/{{$row['audio_file']}}" type="audio/wav">
                            Your browser does not support the audio element.
                        </audio>
                    </td>
                    <td><a href="/uploads/audio/{{$row['audio_file']}}">Download</a></td>
                    <td><a style="color:green;" href="audio/{{$row['id']}}/edit/">Edit</a> | <a href="delete_audio/{{$row['id']}}" style="color:red;">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
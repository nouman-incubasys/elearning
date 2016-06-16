@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Books</div>
                <a role="button" class="btn btn-primary btn-block" href="books/create">Add Book</a>
            </div>
        </div>
       @if(isset($book) && !empty($book)) 
        <table class="table table-responsive">
            <thead>
                <tr  class="info">
                    <th>Sr</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Version</th>
                    <th>Book Cover</th>
                    <th>Action</th>
                    <th>Book</th>
                </tr>
            </thead>
            <tbody>
                @foreach($book as $key=>$row)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$row['title']}}</td>
                    <td>{{$row['author']}}</td>
                    <td>{{$row['version']}}</td>
                    <td>
                        @if(!empty($row['file_icon']))
                        <img style="width:75px;height:75px;" src="uploads/{{$row['file_icon']}}">
                        @else
                        <p> No Image </p>
                        @endif
                    </td>
                    <td><a style="color:green;" href="books/{{$row['id']}}/edit/">Edit</a> | <a href="DeleteBook/{{$row['id']}}" style="color:red;">Delete</a></td>
                    <td>
                        @if(!empty($row['book_file']))
                            <a href="/uploads/{{$row['book_file']}}" download>Download</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       @endif
    </div>
</div>
@endsection
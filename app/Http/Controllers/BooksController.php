<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;

use App\Book;

class BooksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data['book'] = \App\Book::all();
        return view('books.index')->with($data);
    }
    
    public function create()
    {
        return view('books.create');
    }
    
    public function store()
    { 
        $input = Request::all();
        // file upload script
        $destinationPath = 'uploads'; // upload path
        
        $extension = Request::file('file_icon')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        Request::file('file_icon')->move($destinationPath, $fileName); // uploading file to given path

        $extension1 = Request::file('book')->getClientOriginalExtension(); // getting image extension
        $bookName = $input['title'].'.'.$extension1; // renameing image
        Request::file('book')->move($destinationPath, $bookName); // uploading file to given path

        //saving data
        $book = new Book();
        $book->title = $input['title'];
        $book->author = $input['author'];
        $book->version = $input['version'];
        $book->file_icon = $fileName;
        $book->book_file = $bookName;
        $book->save();
        return redirect('/books');
    }
    
    public function edit($id)
    {
        $data['book'] = Book::find($id);
        return view('books.edit')->with($data);   
    }
    
    public function update()
    { 
//        $input = Request::all();
//        dd($input);
//        $book = new Book();
//        $book->title = $input['title'];
//        $book->author = $input['author'];
//        $book->version = $input['version'];
//        $book->file_icon = $input['file_icon'];
//        $book->save();
//        return redirect('/');
    }
    
    public function updateBook($id)
    {
        $input = Request::all();
        $book = Book::find($id);
        $book->title = $input['title'];
        $book->author = $input['author'];
        $book->version = $input['version'];
        $book->file_icon = $input['file_icon'];
        $book->update();
        return redirect('/books');
    }
    
    public function DeleteBook($id) {
        $result = \App\Book::find($id);
        $result->delete();
        return redirect('/books');
    }
    
}

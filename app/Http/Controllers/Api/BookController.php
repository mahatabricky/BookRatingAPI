<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Retrieve All Books
     *
     * @return void
     */
    public function index()
    {
       return $books = BookResource::collection(Book::all());          
    }
    /**
     * Store new book
     * @param Object $request
     */
    public function store(Request $request)
    {
        return null;
    }
    /**
     * Showing individual book
     * @param int $id
     */
    public function show($id)
    {
       $book = Book::find($id);
       if(empty($book)){
           return response()->json(['error'=>'No book found'],201);
       }
       return new BookResource($book);
    }
}

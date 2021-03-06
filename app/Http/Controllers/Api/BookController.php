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
        $book =Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'user_id' => $request->user_id,
        ]);
        return new BookResource($book);
    }
    /**
     * Showing individual book
     * @param [int] $id
     */
    public function show($id)
    {
       $book = Book::find($id);
       if(empty($book)){
           return response()->json(['error'=>'No book found'],201);
       }
       return new BookResource($book);
    }
    /**
     * Update book info
     *
     * @param [object] $request
     * @param [int] $id
     * @return void 
     */
    public function update(Request $request,$id)
    {
        $book = Book::find($id);
        $book =Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'user_id' => $request->user_id,
        ]);
        return new BookResource($book);
    }
    /**
     * Deleting book
     * @param [int] $id
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if(empty($book)){
            return response()->json(['error' => 'Book not found'],201);
        }
        $book->delete();
        return response()->json(['msg' => 'Book deleted successfully'],401);
    }
}

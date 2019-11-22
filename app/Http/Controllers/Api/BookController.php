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
}

<?php

namespace App\Http\Controllers\Api;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    /**
     * Retrieve all Authors
     */
    public function index()
    {
        return $authors = AuthorResource::collection(Author::with('user')->paginate(25));
       // return Author::all();
    }
    /**
     * Create or Add new author to the system
     * @param object $request 
     */
    public function store(Request $request)
    {
        $author =Author::create([
                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
                'user_id' => $request->user_id,
        ]);
        return new AuthorResource($author);
    }
    /**
     * Single instance of authors
     * @param $id
     * return author object
     */
    public function show($id)
    {
        $author = Author::find($id);
        if(empty($author)){
            return response()->json(['error'=>'Author not found'],201);
        }
        return new AuthorResource($author);
    }

    public function destroy($id)
    {
        $author = Author::find($id)->delete();
        return response()->json(['Success' => 'Author has been deleted'],201);
    }
}

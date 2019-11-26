<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;

class RatingController extends Controller
{
    public function index()
    {
        return null;
    }
    public function store()
    {
        return null;
    }
    public function show($id)
    {
        return null;
    }
    public function destroy($id)
    {
        $rating = Rating::find($id);
        if(empty($rating)){
            return response()->json(['Error' => 'No rating found '],201);
        }
         
        $rating->delete();
        return response()->json(['msg' => 'Successfully delete rating'],201);
    }
}

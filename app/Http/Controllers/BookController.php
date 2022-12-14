<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function index()
    {
        //get all data in books table
        $books = Book::all();

        //send 204 if no data
        if(count($books) == 0 ){
            return response()->json([
                'message'=> 'Get all resouces',
                'status'=> 204,
            ], 204);
        }

        return response()->json([
            'message'=> 'Get all resouces',
            'status'=> 200,
            'data' => $books,
        ], 200);
    }

    function store(Request $request)
    {
        $created = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'rating' => $request->rating,
            'published_date' => $request->published_date
        ]);

        return response()->json([
            'message' => 'Resource created succesfuly',
            'status' => 201,
            'data' => $created,
        ], 201);
    }

    function show($id){
        $book = Book::find($id);

        //jika id tidak ditemukan
        if(!$book){
            return response()->json([
                'message' => 'Resource not found',
                'status' => 404,
            ], 404);
        }

        //return book resource
        return response()->json([
            'message' => 'Get detail resource',
            'status' => 200,
            'data' => $book
        ], 200);
    }
}

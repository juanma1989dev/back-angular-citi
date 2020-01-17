<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class Books extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $book = new Book();
        $response = $book->fill($data)->save();

        return response()->json([
            'success' => $response
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data     = $request->all();
        $book   = Book::findOrFail($id);
        $response = $book->update($data) ? true : false;

        return response()->json([
            'success' => $response
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book   = Book::findOrFail($id);
        $response = $book->delete() ? true : false;

        return response()->json([
            'success' => $response
        ]);
    }

    public function searchBook()
    {
        $term   = request()->get('term');
        $search = Book::search($term)->get();

        return response()->json($search);
    }
}

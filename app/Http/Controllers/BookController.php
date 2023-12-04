<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('author')->paginate(10);
    }

    public function show($id)
    {
        return Book::with('author')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'author_id' => 'required|exists:authors,id',
            'publish_date' => 'required|date',
        ]);

        return Book::create($data);
    }


    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'author_id' => 'required|exists:authors,id',
            'publish_date' => 'required|date',
        ]);

        $book->update($data);

        return $book;
    }

    public function searchByAuthorLastName($last_name)
    {
        $author = Author::where('last_name', $last_name)->first();

        if (!$author) {
            return response()->json(['error' => 'A not found'], 404);
        }

        return Book::where('author_id', $author->id)->paginate(10);
    }


}

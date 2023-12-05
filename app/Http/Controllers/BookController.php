<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

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
            'publish_date' => 'required|date',
            'authors' => 'required|array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = Book::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'publish_date' => $data['publish_date'],
        ]);

        $book->authors()->attach($data['authors']);

        $book->saveImage($request->file('image'));

        return $book->load('authors');
    }


    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'publish_date' => 'required|date',
            'authors' => 'required|array',
        ]);

        $book->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'publish_date' => $data['publish_date'],
        ]);

        $book->authors()->sync($data['authors']); //sync синхрон списка авт для книги с заданным списком авторов.

        return $book->load('authors');
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

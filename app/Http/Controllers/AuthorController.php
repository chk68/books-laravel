<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::paginate(10);
    }

    public function show($id)
    {
        return Author::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'last_name' => 'required|min:3', //min 3 dobavit
            'first_name' => 'required',
            'middle_name' => 'nullable',
        ]);

        return Author::create($data);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $data = $request->validate([
            'last_name' => 'required|min:3', // dobavit min3
            'first_name' => 'required',
            'middle_name' => 'nullable',
        ]);

        $author->update($data);

        return $author;
    }


}

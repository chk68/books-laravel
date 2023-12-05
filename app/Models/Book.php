<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'publish_date', 'author_id', 'image'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function saveImage($image)
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = 'images/books/';
        $image->storeAs($path, $filename, 'public');

        $this->update(['image' => $filename]);
    }

    use HasFactory;



}


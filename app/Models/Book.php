<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'publish_date'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['id', 'last_name', 'first_name', 'middle_name'];
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    use HasFactory;
}

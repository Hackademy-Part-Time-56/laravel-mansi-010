<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year', 'image', 'author_id'];
    public function author() //Singolare
    {
        return $this->belongsTo(Author::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'year', 'image', 'author_id', 'user_id'];
    public function author() //Singolare
    {
        return $this->belongsTo(Author::class);
    }

    public function user() //Singolare
    {
        return $this->belongsTo(User::class);
    }

    public function categories() //plurale
    {
        return $this->belongsToMany(Category::class);
    }
}

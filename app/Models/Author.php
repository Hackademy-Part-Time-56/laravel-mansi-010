<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['firstname', 'lastname'];

    public function books() //Plurale
    {
        return $this->hasMany(Book::class);
    }
}

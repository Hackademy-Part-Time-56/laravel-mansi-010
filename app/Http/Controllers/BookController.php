<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        //$books = ['Divina COmmedia', 'testo3'];
        //$books = Book::all();
        // $stringa = 'ccc';
        // if (isset($stringa)) {
        //     dd($stringa);
        // } else {
        //     dd('Ti sei dimenticto di dichiarae la variabile');
        // }

        if (isset(auth()->user()->id)) {
            $books = Book::where('user_id', auth()
                ->user()->id)
                ->orWhere('user_id', null)
                ->get();
        } else {
            $books = Book::all();
        }

        $authors = Author::all();
        return view('welcome', [
            'books' => $books,
            'authors' => $authors
        ]);
        //return view('welcome', compact('books', 'authors'));
    }

    public function create() //GET
    {

        return view('create', ['authors' => Author::all()]);
    }


    public function store(StoreBookRequest $request) //POST
    {
        $path_image = '';
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('covers', $file_name, 'public');
            //oppure piu semplicemente
            //$path_image = $request->file('image')->store('covers', 'public');
        }

        Book::create([
            'name' => $request->name,
            'pages' => $request->pages,
            'year' =>  $request->year,
            'image' =>  $path_image,
            'author_id' =>  $request->author_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('index')->with('success', 'Libro creato con successo');
    }

    public function show(Book $book)
    {
        //return view('show', ['book' => $book]);
        return view('show', compact('book'));
    }

    public function edit(Book $book)
    {
        //Andiamo a controllare se l'utente connesso è il properiotario del libro
        if (auth()->user()->id != $book->user_id) {
            abort(401);
        }
        $authors = Author::all();
        return view('edit', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $path_image = $book->image;
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('covers', $file_name, 'public');
        }

        $book->update([
            'name' => $request->name,
            'pages' => $request->pages,
            'year' =>  $request->year,
            'image' =>  $path_image,
            'author_id' => $request->author_id,
        ]);
        return redirect()->route('index')->with('success', 'Libro modificato con successo');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('index')->with('success', 'Libro cancellato con successo');
    }
}

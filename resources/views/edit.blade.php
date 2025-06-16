 <x-main>
     <div class="container-fluid w-50 mt-5">
         <form action="{{ route('update', ['book' => $book]) }}" method="POST" enctype="multipart/form-data">
             @method('PUT')
             @csrf
             <div class="mb-3">
                 <label class="form-label">Immagine Attuale</label>
                 <img class="img-fluid w-25"
                     src="{{ !empty($book->image) ? Storage::url($book->image) : '/images/book-default.png' }}"
                     alt="Immagine">
             </div>
             <hr>
             <div class="mb-3">
                 <label class="form-label">Nome Libro</label>
                 <input class="form-control" type="text" name="name" required value="{{ $book->name }}">
                 @error('name')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Numero di Pagine</label>
                 <input type="text" class="form-control" name="pages" required value="{{ $book->pages }}">
                 @error('pages')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Anno di Uscita</label>
                 <input type="text" class="form-control" name="year" value="{{ $book->year }}">
             </div>
             <div class="mb-3">
                 <label class="form-label">Copertina</label>
                 <input type="file" class="form-control" name="image" accept="image">
                 @error('image')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <button type="submit" class="btn btn-outline-info btn-lg">Aggiorna</button>
         </form>
         <hr>
         <form action="{{ route('destroy', ['book' => $book]) }}" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Elimina </button>
         </form>
     </div>
 </x-main>

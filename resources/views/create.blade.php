 <x-main>
     <div class="container-fluid w-50 mt-5">
         <form action="/salva-libro" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="mb-3">
                 <label class="form-label">Nome Libro</label>
                 <input class="form-control" type="text" name="name" required value="{{ old('name') }}">
                 @error('name')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Numero di Pagine</label>
                 <input type="text" class="form-control" name="pages" required value="{{ old('pages') }}">
                 @error('pages')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Anno di Uscita</label>
                 <input type="text" class="form-control" name="year" value="{{ old('year') }}">
             </div>
             <div class="mb-3">
                 <label class="form-label">Autore</label>
                 <select name="author_id" class="form-control">
                     <option value="">Nessuno</option>
                     @foreach ($authors as $author)
                         <option value="{{ $author->id }}">{{ $author->firstname . ' ' . $author->lastname }}</option>
                     @endforeach
                 </select>
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
             <button type="submit" class="btn btn-outline-info btn-lg">Salva</button>
         </form>
     </div>
 </x-main>

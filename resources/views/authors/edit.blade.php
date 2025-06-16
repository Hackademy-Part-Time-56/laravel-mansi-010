 <x-main>
     <div class="container-fluid w-50 mt-5">
         <form action="{{ route('authors.update', ['author' => $author]) }}" method="POST">
             @csrf
             @method('PUT')
             <div class="mb-3">
                 <label class="form-label">Nome Autore</label>
                 <input class="form-control" type="text" name="firstname" required value="{{ $author->firstname }}">
                 @error('firstname')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Cognome Autore</label>
                 <input class="form-control" type="text" name="lastname" required value="{{ $author->lastname }}">
                 @error('lastname')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <button type="submit" class="btn btn-outline-info btn-lg">Aggiorna</button>
         </form>
         <hr>
         <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="POST">
             @csrf
             @method('DELETE')
             <button type="submit" class="btn btn-danger">Elimina </button>
         </form>
     </div>
 </x-main>

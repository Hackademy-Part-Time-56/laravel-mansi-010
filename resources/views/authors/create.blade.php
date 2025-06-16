 <x-main>
     <div class="container-fluid w-50 mt-5">
         <form action="{{ route('authors.store') }}" method="POST">
             @csrf
             <div class="mb-3">
                 <label class="form-label">Nome Autore</label>
                 <input class="form-control" type="text" name="firstname" required value="{{ old('firstname') }}">
                 @error('firstname')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <div class="mb-3">
                 <label class="form-label">Cognome Autore</label>
                 <input class="form-control" type="text" name="lastname" required value="{{ old('lastname') }}">
                 @error('lastname')
                     <div class="alert alert-danger mt-1" role="alert">
                         {{ $message }}
                     </div>
                 @enderror
             </div>
             <button type="submit" class="btn btn-outline-info btn-lg">Salva</button>
         </form>
     </div>
 </x-main>

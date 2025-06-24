<x-main>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                    <div class="card shadow-sm">
                        <img class="img-fluid"
                            src="{{ !empty($book->image) ? Storage::url($book->image) : '/images/book-default.png' }}"
                            alt="Immagine">
                        <div class="card-body">
                            <h3 class="card-text">{{ $book->name }}</h3>
                            <p>Numero Pagine: {{ $book->pages }}</p>
                            <p>Anno di Scrittura: {{ $book->year ? $book->year : 'Ignoto' }} </p>
                            <p>Scritto da:
                                {{ isset($book->author->firstname) ? $book->author->firstname . ' ' . $book->author->lastname : ' Autore Sconociuto' }}
                            </p>
                            <h3>Lista Categorie Associate</h3>
                            <ul>
                                @foreach ($book->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-main>

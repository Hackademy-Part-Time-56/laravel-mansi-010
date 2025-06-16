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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-main>

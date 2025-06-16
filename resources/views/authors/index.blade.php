<x-main>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($authors as $author)
                    <div class="col">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <h3 class="card-text">{{ $author->firstname }} {{ $author->lastname }}</h3>

                                <hr>
                                <a href="{{ route('authors.show', ['author' => $author]) }}">Vedi Qui</a>
                                <a href="{{ route('authors.edit', ['author' => $author]) }}">Modifica</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-main>

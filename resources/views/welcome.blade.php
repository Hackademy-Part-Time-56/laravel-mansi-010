<x-main>
    <div class="album py-5 bg-body-tertiary">



        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @else
                Ciao, {{ Auth::user()->email }}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="nav-link" type="submit">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>

        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach ($books as $book)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="img-fluid"
                                src="{{ !empty($book->image) ? Storage::url($book->image) : '/images/book-default.png' }}"
                                alt="Immagine">
                            <div class="card-body">
                                <h3 class="card-text">{{ $book->name }}</h3>
                                <p>Numero Pagine: {{ $book->pages }}</p>
                                <p>Anno di Scrittura: {{ $book->year ? $book->year : 'Ignoto' }} </p>
                                <hr>
                                <a href="{{ route('show', ['book' => $book]) }}">Vedi Qui</a>
                                <a href="{{ route('edit', ['book' => $book]) }}">Modifica</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Stampo i libri

    Stampo Autori
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->firstname . ' ' . $author->lastname }}</li>
        @endforeach

    </ul> --}}
</x-main>

@props(['titre' => 'TechnoWave'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <link rel="stylesheet" href="{{ asset('fonts/stylesheet.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        /** @type {import('tailwindcss').Config} */
        tailwind.config = {
            content: [],
            theme: {
                extend: {
                    colors: {
                        transparent: 'transparent',
                        current: 'currentColor',
                        'blanc': '#ffffff',
                        'noir': '#141414',
                        'bleu': '#78FBFD',
                        'jaune': '#F7CD45',
                        'mauve': '#EA33F7',
                    },
                    dropShadow: {
                        'mauve': '0 0px 5px #EA33F7',
                        'blanc': '0 0px 5px #ffffff',
                    },
                    fontFamily: {
                      lovelo: "loveloline_light",
                      technorace: "techno_raceitalic",
                      quicksand: "quicksandlight",
                    },

                },

            },
            plugins: [],
        }
    </script>
</head>

<body>
    <header class="bg-noir h-96 w-full pt-14 pb-96">
        <div class="flex justify-center">
            <div class="w-1/3">

            </div>
            <div class="w-1/3">
                <a href="{{ route('accueil') }}">
                    <img src="{{url('/image/logo.png')}}" alt="Logo TechnoWave" class="w-auto h-64 m-auto">
                </a>
            </div>
            <div class="flex flex-col justify-start items-end w-1/3">

                @if (Auth::check())
                <button class="mr-8 p-2 border-mauve border-2 rounded drop-shadow-3xl">

                    <a href="{{ route('admin.usagers.edit',  ['id' => 1]) }}">
                        <p class="text-gray-400 font-quicksand text-2xl">Mon compte</p>
                    </a>
                </button>
                    <form action="{{ route('deconnexion') }}" method="POST">
                        @csrf
                        <button class="mr-8 mt-8 p-2 border-mauve border-2 rounded drop-shadow-mauve">
                            <a href="{{ route('deconnexion') }}">
                                <p class="text-gray-400 font-quicksand text-2xl">Déconnexion</p>
                            </a>
                        </button>
                    </form>
                @else
                <button class="mr-8 p-2 border-mauve border-2 rounded drop-shadow-3xl">
                    <a href="{{ route('connexion.create') }}">
                        <p class="text-gray-400 font-quicksand text-2xl">Mon compte</p>
                    </a>
                </button>
                @endif
                <button></button>
            </div>
        </div>
        <div class="w-full flex justify-evenly mt-24 text-white font-technorace text-4xl">
            <h2><a href="{{ route('programmation.index') }}">PROGRAMMATION</a></h2>
            <h2><a href="{{ route('forfaits.index') }}">FORFAITS</a></h2>
            <h2><a href="{{ route('activites.index') }}">ACTIVITÉS</a></h2>
            <h2><a href="{{ route('actualite.index') }}">ACTUALITÉS</a></h2>
            <h2><a href="{{ route('apropos.index') }}">À PROPOS</a></h2>
        </div>





    </header>
    {{ $slot }}
    <footer class="flex flex-col items-center w-full pt-16 pb-16 bg-noir font-quicksand">

        {{-- LOGO --}}
        <div class="mb-12">
            <a href="{{ route('accueil') }}">
                <img src="{{url('image/logo.png')}}" alt="Logo TechnoWave" class="w-auto h-64 m-auto">
            </a>
        </div>

        {{-- INFOLETTRE --}}
        <div class="text-center mt-10 text-white mb-10">
            <h2 class="font-technorace text-4xl">INSCRIVEZ-VOUS À L'INFOLETTRE !</h2>
            <p class="font-quicksand">Restez à jour et soyez au courant des événements à venir</p>

            {{-- INPUT INFOLETTRE --}}
            <div class=" border-white border-2 rounded drop-shadow-blanc flex items-center justify-end">
                <img src="{{url('image/enter.png')}}" alt="">
            </div>
        </div>

        {{-- RÉSEAUX --}}
        <div class="w-1/3 flex justify-around mt-10 mb-10">
            {{-- Instagram --}}
            <a href="https://www.instagram.com/">
                <img src="{{url('image/reseaux/Instagram.png')}}" alt="Instagram" class="w-14 h-auto">
            </a>
            {{-- Facebook --}}
            <a href="https://www.facebook.com/">
                <img src="{{url('image/reseaux/Facebook.png')}}" alt="Facebook" class="w-14 h-auto">
            </a>
            {{-- Spotify --}}
            <a href="https://www.spotify.com/">
                <img src="{{url('image/reseaux/Spotify.png')}}" alt="Spotify" class="w-14 h-auto">
            </a>
        </div>

        {{-- LIENS --}}
        <div class="flex justify-around w-full mt-10 mb-10 text-white font-quicksand text-xl">
            {{-- Programmation --}}
            <div>
                <h3 class="text-mauve font-technorace text-3xl"><a href="{{ route('programmation.index') }}">PROGRAMMATION</a></h3>

                <p>Artistes</p>
                <p>Horraires</p>
            </div>
            {{-- Forfaits --}}
            <div>
                <h3 class="text-mauve font-technorace text-3xl"><a href="{{ route('forfaits.index') }}">FORFAITS</a></h3>

                <p>Tous les forfaits</p>
                <p>Forfait Or</p>
                <p>Forfait Platine</p>
                <p>Forfait Argent</p>
                <p>Forfait une journée</p>
            </div>
            {{-- Activités --}}
            <div>
                <h3 class="text-mauve font-technorace text-3xl"><a href="{{ route('activites.index') }}">ACTIVITÉS</a></h3>

                <p>Arcades</p>
                <p>Feux d'artifices</p>
                <p>Magasinage</p>
            </div>
            {{-- Actualités --}}
            <div>
                <h3 class="text-mauve font-technorace text-3xl"><a href="{{ route('actualite.index') }}">ACTUALITÉS</a></h3>
                <p>Techno féminin</p>
                <p>Album de Hugo Lee</p>
                <p>Nouveaux talents</p>
            </div>
            {{-- À propos --}}
            <div>
                <h3 class="text-mauve font-technorace text-3xl"><a href="{{ route('apropos.index') }}">À PROPOS</a></h3>

                <p>Origines</p>
                <p>Nos valeurs</p>
                <p>Nous joindre</p>
            </div>
        </div>

        @if (Auth::check() && (Auth::user()->role == 2 || Auth::user()->role == 3))
            <a class="text-white" href="{{ route('admin.index') }}">Administration</a>
        @endif

    </footer>
    <script src="js/main.js"></script>
</body>

</html>

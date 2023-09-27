@props(['titre' => 'TechnoWave'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titre }}</title>
    <link rel="stylesheet" href="{{ asset('fonts/stylesheet.css') }}">
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

    <x-alertes.succes cle="succes" />
    <x-alertes.succes cle="erreur" />

    {{-- HEADER --}}
    <header class="bg-noir h-96 w-full pt-14 pb-96 mb-10">

        <div class="flex justify-center">
            <div class="w-1/3">

            </div>

            {{-- LOGO --}}
            <div class="w-1/3">
                <a href="{{ route('accueil') }}">
                    <img src="{{ url('/image/logo.png') }}" alt="Logo TechnoWave" class="w-auto h-64 m-auto logo">
                </a>
            </div>

            {{-- BOUTON MON COMPTE/DECONNEXION --}}
            <div class="flex flex-col justify-start items-end w-1/3 connexion-deconnexion">

                {{-- Bouton mon compte/déconnexion si utilisateur connecté --}}
                @if (Auth::check())
                    <button class="mr-8 p-2 border-mauve border-2 rounded drop-shadow-3xl lien-header">
                        <a href="{{ route('moncompte.edit', ['id' => Auth::user()->id]) }}">
                            <p class="text-gray-400 font-quicksand text-2xl lien-header">Mon compte</p>
                        </a>
                    </button>

                    <form action="{{ route('deconnexion') }}" method="POST">
                        @csrf

                        <button class="mr-8 mt-8 p-2 border-mauve border-2 rounded drop-shadow-mauve lien-header">

                            <a href="{{ route('deconnexion') }}">
                                <p class="text-gray-400 font-quicksand text-2xl lien-header">Déconnexion</p>
                            </a>

                        </button>

                    </form>
                @else
                    {{-- Bouton mon compte si utilisateur n'est pas connecté --}}
                    <button class="mr-8 p-2 border-mauve border-2 rounded drop-shadow-3xl lien-header">

                        <a href="{{ route('connexion.create') }}">
                            <p class="text-gray-400 font-quicksand text-2xl lien-header">Mon compte</p>
                        </a>

                    </button>
                @endif
            </div>

        </div>

        {{-- LIENS --}}
        <div id="app" class="w-full flex justify-evenly mt-24 pb-10 bg-noir text-white font-technorace text-3xl">
            <h2 class="lien-header"><a href="{{ route('programmation.index') }}">PROGRAMMATION</a></h2>

            <h2 class="lien-header"><a href="{{ route('artistes.index') }}">ARTISTES</a></h2>
            <h2 class="lien-header"><a href="{{ route('forfaits.index') }}">FORFAITS</a></h2>

            <h2 class="lien-header"><a href="{{ route('activites.index') }}">ACTIVITÉS</a></h2>

            <h2 class="lien-header"><a href="{{ route('actualite.index') }}">ACTUALITÉS</a></h2>

            <h2 class="lien-header"><a href="{{ route('apropos.index') }}">À PROPOS</a></h2>

        </div>

    </header>

    {{ $slot }}

    {{-- FOOTER --}}
    <footer class="flex flex-col items-center w-full pt-16 pb-16 bg-noir font-quicksand">

        {{-- LOGO --}}
        <div class="mb-12">

            <a href="{{ route('accueil') }}">
                <img src="{{ url('image/logo.png') }}" alt="Logo TechnoWave" class="w-auto h-64 m-auto">
            </a>

        </div>

        {{-- INFOLETTRE --}}
        <div class="text-center mt-10 text-white mb-10">

            <h2 class="font-technorace text-4xl">INSCRIVEZ-VOUS À L'INFOLETTRE !</h2>

            <p class="font-quicksand mb-4">Restez à jour et soyez au courant des événements à venir</p>


            {{-- FORMULAIRE D'ENREGISTREMENT --}}
            <form action="{{ route('infolettre.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                {{-- EMAIL --}}
                <div>
                    <div class="flex items-center justify-center">
                        <input
                            class="border-white border-2 rounded drop-shadow-blanc w-3/4 h-12 bg-transparent text-center text-xl"
                            id="email" name="email" type="email" value="{{ old('email') }}"
                            placeholder="Courriel">
                        <button type="submit">
                            <img class="hover:drop-shadow-blanc" src="{{ url('image/enter.png') }}" alt="">
                        </button>
                    </div>
                    <x-forms.erreur champ="email" />

                </div>
            </form>

        </div>

        {{-- RÉSEAUX --}}
        <div class="w-1/3 flex justify-around mt-10 mb-10">

            {{-- Instagram --}}
            <a href="https://www.instagram.com/">
                <img src="{{ url('image/reseaux/Instagram.png') }}" alt="Instagram" class="w-14 h-auto">
            </a>

            {{-- Facebook --}}
            <a href="https://www.facebook.com/">
                <img src="{{ url('image/reseaux/Facebook.png') }}" alt="Facebook" class="w-14 h-auto">
            </a>

            {{-- Spotify --}}
            <a href="https://www.spotify.com/">
                <img src="{{ url('image/reseaux/Spotify.png') }}" alt="Spotify" class="w-14 h-auto">
            </a>

        </div>

        {{-- LIENS --}}
        <div class="flex justify-around w-full mt-10 mb-10 text-white font-quicksand text-xl">

            {{-- Programmation --}}
            <div class="flex flex-col">
                <h3 class="text-mauve font-technorace text-3xl lien-h3-footer"><a
                        href="{{ route('programmation.index') }}">PROGRAMMATION</a></h3>

                <a class="lien-header" href="{{ route('artistes.index') }}">Artistes</a>
                <a class="lien-header" href="{{ route('programmation.index') }}">Horaires</a>
            </div>

            {{-- Forfaits --}}
            <div class="flex flex-col">
                <h3 class="text-mauve font-technorace text-3xl lien-h3-footer"><a
                        href="{{ route('forfaits.index') }}">FORFAITS</a>
                </h3>

                <a class="lien-header" href="{{ route('forfaits.index') }}">Tous les forfaits</a>
                <a class="lien-header" href="{{ route('forfaits.index') }}#or">Forfait Or</a>
                <a class="lien-header" href="{{ route('forfaits.index') }}#platine">Forfait Platine</a>
                <a class="lien-header" href="{{ route('forfaits.index') }}#argent">Forfait Argent</a>
            </div>

            {{-- Activités --}}
            <div class=" flex flex-col">
                <h3 class="text-mauve font-technorace text-3xl lien-h3-footer"><a
                        href="{{ route('activites.index') }}">ACTIVITÉS</a>
                </h3>

                @foreach ($activites->take(4) as $activite)
                    <a class="lien-header"
                        href="{{ route('activites.show', ['id' => $activite->id]) }}">{{ $activite->nom }}</a>
                @endforeach

            </div>

            {{-- Actualités --}}
            <div class="flex flex-col">
                <h3 class="text-mauve font-technorace text-3xl lien-h3-footer"><a
                        href="{{ route('actualite.index') }}">ACTUALITÉS</a>
                </h3>


                @foreach ($actualites->take(4) as $actualite)
                    <a class="lien-header"
                        href="{{ route('actualite.index') }}#{{ $actualite->id }}">{{ $actualite->titre }}</a>
                @endforeach

            </div>

            {{-- À propos --}}
            <div class=" flex flex-col">
                <h3 class="text-mauve font-technorace text-3xl lien-h3-footer"><a
                        href="{{ route('apropos.index') }}">À
                        PROPOS</a>
                </h3>

                <a class="lien-header" href="{{ route('apropos.index') }}#origine">Origines</a>
                <a class="lien-header" href="{{ route('apropos.index') }}#valeur">Nos valeurs</a>
                <a class="lien-header" href="{{ route('apropos.index') }}#adresse">Nous joindre</a>
            </div>
        </div>

        {{-- Lien vers administration si utilisateur est connecté ET qu'il est employé OU administrateur --}}
        @if (Auth::check() && (Auth::user()->role == 2 || Auth::user()->role == 3))
            <a class="text-white" href="{{ route('admin.index') }}">Administration</a>
        @endif

    </footer>

    <script src="js/main.js" type="module"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EEQ1PZ0ZJW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-EEQ1PZ0ZJW');
    </script>
</body>

</html>

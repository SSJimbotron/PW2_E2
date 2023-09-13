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
                <img src="image/logo.png" alt="Logo TechnoWave" class="w-auto h-64 m-auto">
            </div>
            <div class="flex justify-end items-start w-1/3">
                <button class="pr-8">
                    <p class="text-gray-400 font-quicksand">Mon compte</p>
                </button>
            </div>
        </div>
        <div class="w-full flex justify-evenly mt-14 text-white font-technorace">
            <h2>PROGRAMMATION</h2>
            <h2>FORFAITS</h2>
            <h2>ACTIVITÉS</h2>
            <h2>ACTUALITÉS</h2>
            <h2>À PROPOS</h2>
        </div>





    </header>
    {{ $slot }}
    <footer class="flex flex-col items-center w-full pt-16 pb-16 bg-noir font-quicksand">

        {{-- LOGO --}}
        <div>
            <img src="image/logo.png" alt="Logo TechnoWave" class="w-auto h-64">
        </div>

        {{-- INFOLETTRE --}}
        <div class="text-center mt-10 text-white">
            <h2 class="font-technorace">INSCRIVEZ-VOUS À L'INFOLETTRE !</h2>
            <p>Restez à jour et soyez au courant des événements à venir</p>

            {{-- INPUT INFOLETTRE --}}
            <div class="">

            </div>
        </div>

        {{-- RÉSEAUX --}}
        <div class="w-1/3 flex justify-around mt-10">
            {{-- Instagram --}}
            <a href="https://www.instagram.com/">
                <img src="" alt="Instagram">
            </a>
            {{-- Facebook --}}
            <a href="https://www.facebook.com/">
                <img src="" alt="Facebook">
            </a>
            {{-- Spotify --}}
            <a href="https://www.spotify.com/">
                <img src="" alt="Spotify">
            </a>
        </div>

        {{-- LIENS --}}
        <div class="flex justify-around w-full mt-10 mb-10 text-white">
            {{-- Programmation --}}
            <div>
                <h3 class="text-mauve font-technorace">PROGRAMMATION</h3>

                <p>Artistes</p>
                <p>Horraires</p>
            </div>
            {{-- Forfaits --}}
            <div>
                <h3 class="text-mauve font-technorace">FORFAITS</h3>

                <p>Tous les forfaits</p>
                <p>Forfait Or</p>
                <p>Forfait Platine</p>
                <p>Forfait Argent</p>
                <p>Forfait une journée</p>
            </div>
            {{-- Activités --}}
            <div>
                <h3 class="text-mauve font-technorace">ACTIVITÉS</h3>

                <p>Arcades</p>
                <p>Feux d'artifices</p>
                <p>Magasinage</p>
            </div>
            {{-- Actualités --}}
            <div>
                <h3 class="text-mauve font-technorace">ACTUALITÉS</h3>
                <p>Techno féminin</p>
                <p>Album de Hugo Lee</p>
                <p>Nouveaux talents</p>
            </div>
            {{-- À propos --}}
            <div class="flex flex-col items-start font-quicksand">
                <h3 class="text-mauve font-technorace">À PROPOS</h3>

                <p>Origines</p>
                <p>Nos valeurs</p>
                <p>Nous joindre</p>
            </div>
        </div>
    </footer>
</body>

</html>

<x-layout titre="{{ $artiste->nom }}">
    <div class="activite-show">
        <div class="banniere">
            <h1 class="font-lovelo">
                {{ $artiste->nom }}
            </h1>
        </div>
        <div class="conteneur">
            <div class="image">
                <img src="{{ asset($artiste->image) }}" alt="{{ $artiste->nom }}">
            </div>
            <div class="information">
                <h1 class="font-lovelo">{{ $artiste->nom }}</h1>
                <h2 class="capitalize"><i class="fas fa-calendar"></i> {{ $artiste->journee }}</h2>
                <h2><i class="fas fa-clock"></i> {{ $artiste->heure }}</h2>
                <div class="description">
                    <p>{{ $artiste->description }}</p>


                    <div class="bas">
                        {{-- RÉSEAUX --}}
                        <button class="mr-32 p-2 border-bleu border-2 rounded drop-shadow-3xl lien-header">

                            <a href="{{ route('artistes.index') }}">
                                <p class="text-gray-400 font-quicksand text-2xl lien-header">RETOUR</p>
                            </a>

                        </button>
                        <div class="reseaux">
                            {{-- Instagram --}}
                            <a href="https://www.instagram.com/">
                                <img src="{{ url('image/reseaux/Instagram.png') }}" alt="Instagram" width="25px">
                            </a>
                            {{-- Facebook --}}
                            <a href="https://www.facebook.com/">
                                <img src="{{ url('image/reseaux/Facebook.png') }}" alt="Facebook" width="25px">
                            </a>
                            {{-- Spotify --}}
                            <a href="https://www.spotify.com/">
                                <img src="{{ url('image/reseaux/Spotify.png') }}" alt="Spotify" width="25px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

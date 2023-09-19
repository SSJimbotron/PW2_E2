<x-layout titre="Une activité">

    <div class="activite-show">

        <div class="conteneur">

            <div class="image">

                <img src="{{ asset('image/ActiviteShow/' . $activite->image) }}" alt="{{ $activite->nom }}">

            </div>

            <div class="information">

                <h1 class="font-lovelo">{{ $activite->nom }}</h1>


                <h2>Tous les jours du festival</h2>

                <h2>Alecante,espagne</h2>

                <div class="description">

                    <p>{{ $activite->description }}</p>

                </div>
            </div>
        </div>

    </div>
</x-layout>

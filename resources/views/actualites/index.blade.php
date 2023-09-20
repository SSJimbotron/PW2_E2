<x-layout titre="Actualités">
    <div class="actualites">

        <div class="banniere">

            <h1 class="font-lovelo">
                Toutes les actualités
            </h1>

        </div>
        <div class="actualites-index">

            @foreach ($actualites as $actualite)
                <div class="plan-carte">

                    <div class="carte-actualites">

                        <img src="{{ asset('image/Actualites/' . $actualite->image) }}"
                            alt="{{ $actualite->titre }}">

                    </div>

                    <div class="carte-information">
                        <a href="{{ route('activites.show', ['id' => $actualite->id]) }}" class="font-quicksand">
                            <h1 class="font-lovelo">{{ $actualite->titre }}</h1>
                        </a>

                        <p>Publié le : {{ $actualite->created_at->format('d/m/Y H:i') }}</p>


                        <p> {{ $actualite->contenu }}</p>
                        <div class="charger">
                            <button id="charger">Voir plus</button>
                        </div>

                    </div>


                </div>
            @endforeach
        </div>

    </div>

</x-layout>

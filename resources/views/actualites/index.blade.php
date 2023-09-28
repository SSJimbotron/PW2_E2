<x-layout titre="Actualités">
    <div class="actualites">
        <div class="banniere">
            <h1 class="font-lovelo">
                Toutes les actualités
            </h1>
        </div>
        <div class="actualites-index">
            @foreach ($actualites as $actualite)
                <div id="{{ $actualite->id }}"></div>
                <div class="plan-carte">

                    <div class="actualite-image">

                        <img src="{{ asset($actualite->image) }}" alt="{{ $actualite->titre }}">

                    </div>
                    <div class="carte-information carte-info-{{ $actualite->id }}" data-state="hidden">

                        <h1 class="font-lovelo">{{ $actualite->titre }}</h1>

                        <p class="date">Publié le : {{ $actualite->created_at->format('d/m/Y H:i') }}</p>


                        <!-- Partie initialement visible -->
                        <p class="intro">
                            {{ substr($actualite->contenu, 0, 400) }}{{ strlen($actualite->contenu) > 200 ? '...' : '' }}
                        </p>


                        <!-- Le reste du contenu (initiallement caché) -->

                        <p class="contenu">{{ ($actualite->contenu) }}</p>

                        <div class="charger">
                            <button class="voir-plus btn-9 ">
                                <p>Voir plus</p>
                            </button>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

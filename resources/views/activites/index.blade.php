<x-layout titre="Activités">

    <div class="activites">

        <div class="banniere">

            <h1 class="font-lovelo">
                Toutes les activités
            </h1>

        </div>

        <div class="activites-index">

            @foreach ($activites as $activite)

                <div class="plan-carte">

                    <div class="carte-activite">

                        <img class="activite-image" src="{{ asset('image/ActiviteIndex/' . $activite->image) }}"
                            alt="{{ $activite->nom }}">

                    </div>

                    <div class="carte-nom">

                        <h2 class="font-lovelo">{{ $activite->nom }}</h2>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

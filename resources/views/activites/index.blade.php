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
                        <a href="{{ route('activites.show', ['id' => $activite->id]) }}" class="font-lovelo">
                            {{ $activite->nom }}
                        </a>
                    </div>


                </div>
            @endforeach
        </div>

        <div class="accessibilites">
            <h1 class="font-lovelo">Accessibilités</h1>
            <div class="separation"></div>
            <div class="tags" >
                <img src="{{ asset('image/Accessabilite/ATM.png') }}" alt="">
                <img class="pic-nique"src="{{ asset('image/Accessabilite/Banc de pique-nique.png') }}" alt="">
                <img src="{{ asset('image/Accessabilite/Guichet de billetterie.png') }}" alt="">
                <img class="magasinage" src="{{ asset('image/Accessabilite/Magasinage.png') }}" alt="">
            </div>
        </div>

    </div>
</x-layout>

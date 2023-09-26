<x-layout>

    <div class="acceuil">
        <div class="forfaits">
            <div>
                <h1>Forfaits en vedettes</h1>

            </div>

        </div>
        <div class="activites">
            <div>
                <h1>Nos activités</h1>
                @foreach ($activites as $actualite)
                    {{ $actualite->nom }}
                @endforeach
            </div>

        </div>
        <div class="actualites">
            <div>
                <h1>Nos actualites</h1>

            </div>

        </div>
        <div class="accessibilites">
            <div>
                <h1>Accessibilites</h1>


            </div>

        </div>
    </div>

</x-layout>

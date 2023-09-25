<x-layout titre="Artistes">
    <div class="artistes">
        <div class="banniere">

            <h1 class="font-lovelo">
                Artistes
            </h1>

        </div>

        <div class="contenu">
            @foreach ($artistes as $artiste)
                <div class="plan-carte-artiste">

                    <div class="carte-activite">
                        <a href="{{ route('artistes.show', ['id' => $artiste->id]) }}">
                            <img class="artiste-image" src="{{ $artiste->image }}" alt="">
                        </a>
                    </div>

                    <div class="carte-nom-artiste">
                        <a href="{{ route('artistes.show', ['id' => $artiste->id]) }}">
                            <h2 class="font-technorace">{{$artiste->nom}}</h2>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
</x-layout>

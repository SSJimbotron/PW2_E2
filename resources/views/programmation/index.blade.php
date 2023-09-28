<x-layout titre="Programmation">
    <div class="programmation">
        <div class="banniere">

            <h1 class="font-lovelo">
                Programmation
            </h1>

        </div>

        <div class="haut-page">
            <h2 class="font-lovelo date">DU 19 au 21 Juillet 2024</h2>
            <div>
                <h2 class="font-technorace"><a href="{{ route('forfaits.index') }}">Achetez vos Billets</a></h2>
            </div>
        </div>

        <div class="contenu">
            <h2 class="journee vendredi font-lovelo">Vendredi</h2>

            @foreach ($artistes as $artiste)
                @if ($artiste->journee == 'vendredi')
                    <div class="artiste">

                        <div class="img img-vendredi">
                            <img src="{{ $artiste->image }}" alt="">
                        </div>
                        <div class="infos infos-vendredi">
                            <a class="w-full" href="{{route('artistes.show',["id" => $artiste->id])}}">
                                <div class="nom">
                                    <h3 class="vendredi font-lovelo nom-artiste">{{ $artiste->nom }}</h3>
                                </div>
                            </a>
                            <div class="heure">
                                <h3 class="font-technorace">{{ $artiste->heure }}</h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach




            <h2 class="journee samedi font-lovelo">Samedi</h2>

            @foreach ($artistes as $artiste)
                @if ($artiste->journee == 'samedi')
                    @if ($artiste->nom == 'DEE JAY' || $artiste->nom == 'Mister TechnoFantome')
                        <div class="artiste-principal" style="background-image: url('{{ $artiste->image }}')">
                            <div class="heure">
                                <h3 class="font-technorace">{{ $artiste->heure }}</h3>
                            </div>
                            <a class="w-full" href="{{route('artistes.show',["id" => $artiste->id])}}">
                                <div class="nom">
                                    <h3 class="font-lovelo nom-artiste">{{ $artiste->nom }}</h3>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="artiste">
                            <div class="infos infos-samedi">
                                <div class="heure">
                                    <h3 class="font-technorace">{{ $artiste->heure }}</h3>
                                </div>
                                <div class="nom">
                                    <h3 class="samedi font-lovelo nom-artiste">{{ $artiste->nom }}</h3>
                                </div>
                            </div>
                            <div class="img img-samedi">
                                <img src="{{ $artiste->image }}" alt="">
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach


            <h2 class="journee dimanche font-lovelo">Dimanche</h2>


            @foreach ($artistes as $artiste)
                @if ($artiste->journee == 'dimanche')
                    <div class="artiste">
                        <div class="img img-dimanche">
                            <img src="{{ $artiste->image }}" alt="">
                        </div>
                        <div class="infos infos-dimanche">
                            <a class="w-full" href="{{route('artistes.show',["id" => $artiste->id])}}">
                                <div class="nom">
                                    <h3 class="dimanche font-lovelo nom-artiste">{{ $artiste->nom }}</h3>
                                </div>
                            </a>
                            <div class="heure">
                                <h3 class="font-technorace">{{ $artiste->heure }}</h3>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
    </div>
</x-layout>

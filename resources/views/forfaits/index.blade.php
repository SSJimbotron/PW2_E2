<x-layout titre="Forfaits">

    <div class="forfaits">

        <div class="banniere">

            <h1 class="font-lovelo">
                Forfaits
            </h1>

        </div>

        <div id="platine">
            <div class="forfait_carte">
                <div>
                    <div>
                        <img src="image/Forfaits/platine.png" alt="">
                        <h2 class="font-lovelo platine">Platine</h2>
                    </div>
                    <button class="font-quicksand platine"><a
                        href="{{ route('reservations.index') }}">Réserver</a></button>
                </div>
                <div>
                    <p class="font-quicksand platine">Accès exclusif aux zones VIP du festival.
                        Billets pour tous les jours du festival, y compris les pré-événements.
                        Rencontrez des artistes en backstage en scéance personnelle
                        Repas gratuits et boissons illimitées dans les espaces VIP.
                        Accès à des toilettes propres et confortables.</p>
                    <div class="forfait_infos platine">
                        <h3 class="font-technorace">3 jours</h3>
                        <h3 class="font-technorace">169,99$</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="or">
            <div class="forfait_carte">
                <div>
                    <div>
                        <img src="image/Forfaits/or.png" alt="">
                        <h2 class="font-lovelo or">Or</h2>
                    </div>
                    <button class="font-quicksand or"><a
                        href="{{ route('reservations.index') }}">Réserver</a></button>
                </div>
                <div>
                    <p class="font-quicksand or">Billets pour le festival et emplacement de camping inclus.
                        Expérience immersive en plein air avec des activités telles le yoga.
                        Accès à des douches et des toilettes de camping.
                        Feux de camp communautaires et soirées sous les étoiles.
                        Possibilité de rencontrer d'autres festivaliers avides d'aventure.</p>
                    <div class="forfait_infos or">
                        <h3 class="font-technorace">2 jours</h3>
                        <h3 class="font-technorace">99,99$</h3>
                    </div>
                </div>
            </div>
        </div>
        <div id="argent">
            <div class="forfait_carte">
                <div>
                    <div>
                        <img src="image/Forfaits/argent.png" alt="">
                        <h2 class="font-lovelo argent">Argent</h2>
                    </div>
                    <button class="font-quicksand argent"><a
                            href="{{ route('reservations.index') }}">Réserver</a></button>
                </div>
                <div>
                    <p class="font-quicksand argent">Billets pour le festival à un prix abordable.
                        Accès à toutes les scènes et zones d'animation.
                        Possibilité d'apporter votre propre nourriture et boissons
                        Expérience authentique de festival avec une ambiance animée.
                        Idéal pour les étudiants et les amateurs de musique soucieux de leur budget.</p>
                    <div class="forfait_infos argent">
                        <h3 class="font-technorace">1 jours</h3>
                        <h3 class="font-technorace">79,99$</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

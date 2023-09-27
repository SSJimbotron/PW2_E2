<x-layout titre="Modification de mon compte">

    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ZONE CLIENT</h1>


        <div class="formulaire-enregistrement">
            <div>
                <h2 class="font-lovelo neon-text">
                    USAGER
                </h2>
            </div>

            {{-- FORMULAIRE DE MODIFICATION --}}
            <form action="{{ route('moncompte.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $usager->id }}">


                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">
                        Nom
                    </label>
                    <div class="">
                        <input id="nom" name="nom" type="text" value="{{ old('nom') ?? $usager->nom }}"
                            autocomplete="family-name" class="">

                        <x-forms.erreur champ="nom" />
                    </div>

                </div>

                {{-- PRÉNOM --}}
                <div class="section">
                    <label for="prenom" class="font-technorace">Prénom</label>
                    <div class="">
                        <input id="prenom" name="prenom" type="text"
                            value="{{ old('prenom') ?? $usager->prenom }}">

                        <x-forms.erreur champ="prenom" />

                    </div>
                </div>



                {{-- EMAIL --}}
                <div class="section">
                    <label for="email" class="font-technorace">Courriel</label>
                    <div class="">
                        <input id="email" name="email" type="email"
                            value="{{ old('email') ?? $usager->email }}">

                        <x-forms.erreur champ="email" />
                    </div>

                </div>

                <div class="submit">

                    <button type="submit" class="font-quicksand hover:text-jaune">
                        Modifier
                    </button>


                </div>
            </form>

            {{-- ========================================================================== --}}

            {{-- *** MOT DE PASSE *** --}}

            {{-- FORMULAIRE DE MODIFICATION --}}
            <form action="{{ route('moncompte.mdp.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $usager->id }}">


                {{-- PASSWORD --}}
                <div class="section">
                    <div class="flex items-center justify-between">
                        <label for="password" class="font-technorace">
                            Mot de passe
                        </label>
                    </div>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password">

                        <x-forms.erreur champ="password" />
                    </div>

                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="section">
                    <div class="">
                        <label for="confirm-password" class="font-technorace">
                            Confirmation du mot de passe
                        </label>
                    </div>
                    <div>
                        <input id="confirm-password" name="confirmation_password" type="password" class="">

                        <x-forms.erreur champ="confirmation_password" />
                    </div>
                </div>

                <div class="submit">

                    <button type="submit" class="font-quicksand hover:text-jaune">
                        Modifier
                    </button>


                </div>
            </form>

            {{-- ========================================================================== --}}

            {{-- *** RESERVATIONS *** --}}
            <div class="reservation-section">
                <div>
                    <h2 class="font-lovelo neon-text">
                        Réservations
                    </h2>
                </div>

                <p class="font-technorace"><a class="call-to-action" href="{{ route('reservations.index') }}">Achetez
                        vos Billets</a></p>
                @foreach ($reservations as $reservation)
                    @if ($reservation->user_id == Auth::user()->id)
                        <tr>
                            <p>
                                <td>
                                    {{-- Récupère le nom du forfait associé à la réservation --}}
                                    @foreach ($forfaits as $forfait)
                                        @if ($forfait->id == $reservation->forfait_id)
                                            <a
                                                href="{{ route('reservations.edit', ['id' => $reservation->id, 'usager_id' => $usager->id]) }}">{{ $forfait->nom }}</a>
                                        @endif
                                    @endforeach
                                </td>
                                <td><a
                                        href="{{ route('reservations.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_arrivee }}</a>
                                </td>
                                <td><a
                                        href="{{ route('reservations.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_depart }}</a>
                                </td>
                            </p>
                        </tr>
                    @endif
                @endforeach
            </div>

            {{-- RETOUR À L'ACCUEIL --}}
            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="{{ route('accueil') }}" class="hover:text-jaune">Retour</a>

            </p>

        </div>
    </div>






</x-layout>

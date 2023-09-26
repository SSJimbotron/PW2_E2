<x-layout titre="Modification de l'utilisateur">

    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>


        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifiez l'utilisateur
                </h2>

            </div>

            {{-- FORMULAIRE DE MODIFICATION --}}
            <form action="{{ route('admin.usagers.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $usager->id }}">


                {{-- NOM --}}
                <div class="section">
                    <label for="nom" class="font-technorace">
                        Nom
                    </label>
                    <div>
                        <input id="nom" name="nom" type="text" value="{{ old('nom') ?? $usager->nom }}"
                            autocomplete="family-name">

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

                {{-- ROLE --}}

                <div class="section">
                    <div>
                        <label for="role" class="font-technorace">
                            Role de l'utilisateur
                        </label>
                    </div>
                    <div>
                        <select id="role" name="role" class="text-noir">
                            @if ($usager->role = 1)
                                <option selected value="1">Clients</option>
                            @else
                                <option value="1">Clients</option>
                            @endif
                            @if ($usager->role == 2)
                                <option selected value="2">Employé</option>
                            @else
                                <option value="1">Employé</option>
                            @endif
                            @if ($usager->role == 3)
                                <option selected value="3">Administrateur</option>
                            @else
                                <option value="1">Administrateur</option>
                            @endif
                        </select>
                    </div>
                    <x-forms.erreur champ="role" />
                </div>

                <div class="submit">

                    <button type="submit" class="font-quicksand hover:text-bleu">
                        Modifiez le compte
                    </button>


                </div>
            </form>

            {{-- SUPPRESSION --}}
            <form class="space-y-6" action="{{ route('admin.usagers.destroy') }}" method="POST"
                enctype="multipart/form-data">
                @csrf



                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $usager->id }}">

                {{-- SUBMIT --}}
                <div class="submit">

                    <button type="submit" class="font-quicksand supprime">
                        Supprimez l'usager
                    </button>

                </div>

                {{-- ========================================================================== --}}

                {{-- *** RESERVATIONS *** --}}

                @foreach ($reservations as $reservation)
                    @if ($reservation->user_id == Auth::user()->id)
                        <tr>
                            <p>
                                <td><a href="{{ route('admin.reservations.edit', ['id' => $reservation->id]) }}">
                                        @foreach ($usagers as $usager)
                                            @if ($reservation->user_id == $usager->id)
                                                {{ $usager->nom }} {{ $usager->prenom }}
                                            @endif
                                        @endforeach
                                    </a>
                                </td>
                                <td><a
                                        href="{{ route('admin.reservations.edit', ['id' => $reservation->id, 'usager_id' => $usager->id]) }}">{{ $reservation->forfait_id }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.reservations.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_arrivee }}</a>
                                </td>
                                <td><a
                                        href="{{ route('admin.reservations.edit', ['id' => $reservation->id]) }}">{{ $reservation->date_depart }}</a>
                                </td>
                            </p>
                        </tr>
                    @endif
                @endforeach
            </form>

            {{-- RETOUR AUX ACTUALITES --}}
            <div class="retour">
                <p>
                    <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                </p>
            </div>
        </div>
    </div>



</x-layout>

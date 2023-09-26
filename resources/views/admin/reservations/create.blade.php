<x-layout titre="Nouvelle réservation">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Réservation
                </h2>

            </div>

            {{-- FORMULAIRE --}}
            <form action="{{ route('admin.reservations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                {{-- CLIENT --}}
                <div class="section">
                    <label for="client" class="font-technorace">Client</label>
                    <div>
                        <select name="client" id="client">
                            @foreach ($usagers as $usager)
                                <option value="{{ $usager->id }}">
                                    {{ $usager->id }} {{ $usager->nom }} {{ $usager->prenom }}
                                </option>
                            @endforeach
                        </select>

                        <x-forms.erreur champ="client" />
                    </div>
                </div>

                {{-- FORFAIT --}}
                <div class="section">
                    <label for="forfait" class="font-technorace">Forfait</label>
                    <div>
                        <select

                            name="forfait" id="forfait">
                            @foreach ($forfaits as $forfait)
                                <option value="{{ $forfait->id }}" forfaitjour="{{ $forfait->jour }}">
                                    {{ $forfait->id }} {{ $forfait->nom }}
                                </option>
                            @endforeach
                        </select>

                        <x-forms.erreur champ="forfait" />
                    </div>
                </div>

                {{-- DATE ARRIVEE --}}
                <div class="section">

                    <label for="date_arrivee" class="font-technorace">Date
                        d'arrivée</label>
                    <div>
                        <input type="date" id="date_arrivee" name="date_arrivee" value="2024-08-19" min="2024-08-19"
                            max="2024-08-21" />

                            <x-forms.erreur champ="date_arrivee" />
                    </div>
                </div>
                {{-- DATE DEPART --}}
                <div class="section">

                    <label for="date_depart" class="font-technorace">Date de
                        depart
                    </label>
                    <div>
                        <input type="date" id="date_depart" name="date_depart" value="2024-08-21" min="2024-08-19"
                            max="2024-08-21" />

                            <x-forms.erreur champ="date_depart" />
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="submit">

                    <button type="submit" class="font-quicksand">
                        Créez la réservation
                    </button>

                </div>
            </form>

            {{-- LIEN RETOUR --}}
            <div class="retour">
                <p>
                    <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                </p>
            </div>
        </div>
    </div>
    </div>
</x-layout>

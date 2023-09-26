<x-layout titre="Modification de l'actualité">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier une réservation
                </h2>

            </div>

            <form action="{{ route('admin.reservations.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $reservation->id }}">

                {{-- CLIENT --}}
                <div>
                    <select
                        class=" select-client block w-full rounded-md border-0 py-1.5 text-blanc-900 shadow-sm font font-quicksand"
                        name="client" id="client">
                        @foreach ($usagers as $usager)
                            @if ($usager->id == Auth::user()->id)
                                <option value="{{ $usager->id }}">
                                    <h2>{{ $usager->nom }} {{ $usager->prenom }}</h2>
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <x-forms.erreur champ="client" />
                {{-- FORFAIT --}}
                <div>
                    <label for="forfait">Forfait</label>
                    <div>
                        <select
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                            name="forfait" id="forfait">
                            @foreach ($forfaits as $forfait)
                                @if ($forfait->id == $reservation->forfait_id)
                                    <option selected value="{{ old('forfait') ?? $forfait->id }}">
                                        {{ $forfait->id }} {{ $forfait->nom }}
                                    </option>
                                @else
                                    <option value="{{ old('forfait') ?? $forfait->id }}">
                                        {{ $forfait->id }} {{ $forfait->nom }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <x-forms.erreur champ="forfait" />
                </div>

                {{-- DATE ARRIVEE --}}
                <div>

                    <label for="date_arrivee" class="block text-sm font-medium leading-6 text-gray-900">Date
                        d'arrivée</label>
                    <div class="mt-2">
                        <input type="date" id="date_arrivee" name="date_arrivee"
                            value="{{ old('date_arrivee') ?? $reservation->date_arrivee }}" min="2024-08-19"
                            max="2024-08-21" />
                    </div>
                    <x-forms.erreur champ="date_arrivee" />
                </div>
                {{-- DATE DEPART --}}
                <div>

                    <label for="date_depart" class="block text-sm font-medium leading-6 text-gray-900">Date de
                        depart
                    </label>
                    <div class="mt-2">
                        <input type="date" id="date_depart" name="date_depart"
                            value="{{ old('date_depart') ?? $reservation->date_depart }}" min="2024-08-19"
                            max="2024-08-21" />
                    </div>
                    <x-forms.erreur champ="date_depart" />
                </div>

                {{-- SUBMIT --}}
                <div class="submit mt-2">
                    <button type="submit" class="font-quicksand">Modifier la réservation</button>
                </div>

            </form>

            {{-- SUPPRESSION --}}
            <form class="space-y-6" action="{{ route('admin.reservations.destroy') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="submit">

                    {{-- ID --}}
                    <input type="hidden" name="id" value="{{ $reservation->id }}">

                    <button type="submit" class="supprime font-quicksand">Supprimer la réservation</button>
                </div>

            </form>


            {{-- RETOUR AUX À L'ADMINISTRATION --}}
            <div class="retour">
                <p>
                    <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-layout>

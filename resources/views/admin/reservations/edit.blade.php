<x-layout titre="Modification de l'actualité">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier une réservation
                </h2>

            </div>

                    <form action="{{ route('admin.reservations.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- ID --}}
                        <input type="hidden" name="id" value="{{ $reservation->id }}">

                        {{-- CLIENT --}}
                        @foreach ($usagers as $usager)
                            @if ($usager->id == $reservation->user_id)
                                <h2>{{ $usager->nom }} {{ $usager->prenom }}</h2>
                                <input type="hidden" name="client" id="client" value="{{ $usager->id }}">
                            @endif
                        @endforeach
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
                                            <option selected value="{{ old('forfait') ?? $reservation->forfait_id }}">
                                                {{ $forfait->id }} {{ $forfait->nom }}
                                            </option>
                                        @else
                                            <option value="{{ old('forfait') ?? $reservation->forfait_id }}">
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
                                    value="{{ $reservation->date_arrivee }}" min="2024-08-19" max="2024-08-21" />
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
                                    value="{{ $reservation->date_depart }}" min="2024-08-19" max="2024-08-21" />
                            </div>
                            <x-forms.erreur champ="date_depart" />
                        </div>

                        {{-- SUBMIT --}}
                        <div class="mt-2">
                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Modifier!">
                        </div>

                    </form>

                    {{-- SUPPRESSION --}}
                    <form class="space-y-6" action="{{ route('admin.reservations.destroy') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2">

                            {{-- ID --}}
                            <input type="hidden" name="id" value="{{ $reservation->id }}">

                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Supprimer">
                        </div>

                    </form>


                    {{-- RETOUR AUX À L'ADMINISTRATION --}}
                    <div class="retour">
                        <p >
                            <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

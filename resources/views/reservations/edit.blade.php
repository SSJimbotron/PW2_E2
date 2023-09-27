<x-layout titre="Modification de l'actualité">
    <div class="conteneur-enregistrement">
        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier une réservation
                </h2>

            </div>
            <div class="flex min-h-full flex-col justify-center px-6 py-1 lg:px-8">

                <div class="mt-10 mx-auto w-full max-w-4xl">
                    <form class="space-y-6" action="{{ route('reservations.update') }}" method="POST"
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
                        <div class="mt-2">
                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Modifier!">
                        </div>

                    </form>

                    {{-- SUPPRESSION --}}
                    <form class="space-y-6" action="{{ route('reservations.destroy') }}" method="POST"
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
                    <p class="mt-10 text-center text-sm text-gray-500">
                        <a href="{{ route('moncompte.edit', ['id' => Auth::user()->id]) }}"
                            class="hover:text-indigo-600">Retour au compte</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

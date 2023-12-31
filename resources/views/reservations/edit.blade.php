<script>
    // Wait for the DOM to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the select element and the target div
        const forfaitSelect = document.getElementById("forfait");
        const descriptionDiv = document.getElementById("forfait_description");
        const jourDiv = document.getElementById("forfait_jour");
        const nomDiv = document.getElementById("forfait_titre");

        const selectedOption = forfaitSelect.options[forfaitSelect.selectedIndex];

        // Get the description from the data attribute of the selected option
        const description = selectedOption.getAttribute("description");
        const jour = selectedOption.getAttribute("forfaitjour");
        const nom = selectedOption.getAttribute("forfait-nom");

        // Update the content of the description div
        descriptionDiv.innerHTML = description;
        jourDiv.innerHTML = jour;
        nomDiv.innerHTML = nom;
        // Add an event listener to the select element
        forfaitSelect.addEventListener("change", function() {
            // Get the selected option
            const selectedOption = forfaitSelect.options[forfaitSelect.selectedIndex];

            // Get the description from the data attribute of the selected option
            const description = selectedOption.getAttribute("description");
            const jour = selectedOption.getAttribute("forfaitjour");
            const nom = selectedOption.getAttribute("forfait-nom");

            // Update the content of the description div
            descriptionDiv.innerHTML = description;
            jourDiv.innerHTML = jour;
            nomDiv.innerHTML = nom;
        });
    });
</script>

<x-layout titre="Modification de l'actualité">

    <div class="conteneur-enregistrement">

        <div class="forfait_details">
            <h2 id="forfait_titre" class="font-lovelo neon-text"></h2>
            <h3 class="font-lovelo neon-text">Jours:</h3>
            <div id="forfait_jour" class="font-quicksand"></div>
            <h3 class="font-lovelo neon-text">Description:</h3>
            <div id="forfait_description" class="font-quicksand"></div>
        </div>

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
                            <label class="font-technorace" for="forfait">Forfait</label>
                            <div>
                                <select
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                    name="forfait" id="forfait">
                                    @foreach ($forfaits as $forfait)
                                        @if ($forfait->id == $reservation->forfait_id)
                                            <option selected value="{{ old('forfait') ?? $forfait->id }}" forfaitjour="{{ $forfait->jour }}"
                                                forfait-nom="{{ $forfait->nom }}" description="{{ $forfait->description }}">
                                                {{ $forfait->id }} {{ $forfait->    nom }}
                                            </option>
                                        @else
                                            <option value="{{ old('forfait') ?? $forfait->id }}" forfaitjour="{{ $forfait->jour }}"
                                                forfait-nom="{{ $forfait->nom }}" description="{{ $forfait->description }}">
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

                            <label for="date_arrivee" class="font-technorace">Date
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

                            <label for="date_depart" class="font-technorace">Date de
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
                        <div class="submit">
                            <button type="submit" class="font-quicksand">Modifier</button>
                        </div>

                    </form>

                    {{-- SUPPRESSION --}}
                    <form class="space-y-6" action="{{ route('reservations.destroy') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="submit">

                            {{-- ID --}}
                            <input type="hidden" name="id" value="{{ $reservation->id }}">

                            <button type="submit" class="supprime">Supprimer la réservation
                            </button>

                    </form>


                </div>

                {{-- RETOUR AUX À L'ADMINISTRATION --}}
                <p class="mt-10 text-center text-sm text-gray-500">
                    <a href="{{ route('moncompte.edit', ['id' => Auth::user()->id]) }}" class="font-quicksand">Retour
                        au compte</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>

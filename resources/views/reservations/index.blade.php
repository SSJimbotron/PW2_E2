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

<x-layout titre="Nouvelle réservation">
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
                    Réservation
                </h2>

            </div>
            <div class="mt-10 mx-auto w-full max-w-sm">
                {{-- FORMULAIRE --}}
                <form class="space-y-6" action="{{ route('reservations.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- CLIENT --}}
                    <div>
                        <div class="mt-2 ">
                            @foreach ($usagers as $usager)
                                @if ($usager->id == Auth::user()->id)
                                    <h2>{{ $usager->nom }} {{ $usager->prenom }}</h2>
                                    <input type="hidden" name="client" id="client" value="{{ $usager->id }}">
                                @endif
                            @endforeach
                        </div>
                        <x-forms.erreur champ="client" />
                    </div>
                    {{-- FORFAIT --}}
                    <div>
                        <label for="forfait" class="font-technorace">Forfait</label>
                        <div>
                            <select
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                name="forfait" id="forfait">

                                @foreach ($forfaits as $forfait)
                                    @if ($forfait->id == $id_forfait)
                                        <option selected value="{{ old('forfait') ?? $forfait->id }}"
                                            forfaitjour="{{ $forfait->jour }}" forfait-nom="{{ $forfait->nom }}"
                                            description="{{ $forfait->description }}">
                                             {{ $forfait->nom }}
                                        </option>
                                    @else
                                        <option value="{{ old('forfait') ?? $forfait->id }}"
                                            forfaitjour="{{ $forfait->jour }}" forfait-nom="{{ $forfait->nom }}"
                                            description="{{ $forfait->description }}">
                                           {{ $forfait->nom }}
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
                            <input type="date" id="date_arrivee" name="date_arrivee" value="2024-08-19"
                                min="2024-08-19" max="2024-08-21" />
                        </div>
                        <x-forms.erreur champ="date_arrivee" />
                    </div>
                    {{-- DATE DEPART --}}
                    <div>

                        <label for="date_depart" class="font-technorace">Date de
                            depart
                        </label>
                        <div class="mt-2">
                            <input type="date" id="date_depart" name="date_depart" value="2024-08-21"
                                min="2024-08-19" max="2024-08-21" />
                        </div>
                        <x-forms.erreur champ="date_depart" />
                    </div>

                    {{-- SUBMIT --}}
                    <div class="submit">
                        <button type="submit" class="submit">Réserver</button>
                    </div>
                </form>

                {{-- LIEN RETOUR --}}
                <p class="mt-10 text-center text-sm text-gray-500">
                    <a href="{{ route('moncompte.edit', ['id' => Auth::user()->id]) }}"
                        class="hover:text-jaune font-quicksand">Retour</a>
                </p>
            </div>
        </div>

    </div>
</x-layout>

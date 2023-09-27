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
                <form class="space-y-6" action="{{ route('clients.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    {{-- CLIENT --}}
                    <div>
                        <label for="client" class="block text-sm font-medium leading-6 text-gray-900">Client</label>
                        <div class="mt-2 ">
                            <select
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset select-client"
                                name="client" id="client">
                                @foreach ($usagers as $usager)
                                    @if ($usager->id == Auth::user()->id)
                                        <option value="{{ $usager->id }}">
                                            {{ $usager->nom }} {{ $usager->prenom }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <x-forms.erreur champ="client" />
                    </div>

                    {{-- FORFAIT --}}
                    <div>
                        <label for="forfait">Forfait</label>
                        <div>
                            <select
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                name="forfait" id="forfait">
                                @foreach ($forfaits as $forfait)
                                    <option value="{{ $forfait->id }}" forfaitjour="{{ $forfait->jour }}"
                                        forfait-nom="{{ $forfait->nom }}" description="{{ $forfait->description }}">
                                        {{ $forfait->nom }}
                                    </option>
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
                            <input type="date" id="date_arrivee" name="date_arrivee" value="2024-08-19"
                                min="2024-08-19" max="2024-08-21" />
                        </div>
                        <x-forms.erreur champ="date_arrivee" />
                    </div>
                    {{-- DATE DEPART --}}
                    <div>

                        <label for="date_depart" class="block text-sm font-medium leading-6 text-gray-900">Date de
                            depart
                        </label>
                        <div class="mt-2">
                            <input type="date" id="date_depart" name="date_depart" value="2024-08-21"
                                min="2024-08-19" max="2024-08-21" />
                        </div>
                        <x-forms.erreur champ="date_depart" />
                    </div>

                    {{-- SUBMIT --}}
                    <div class="mt-2">
                        <input type="submit"
                            class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            value="Réserver!">
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

<x-layout titre="Nouvelle réservation">
    @dump($errors)
    <div class="conteneur-enregistrement">
        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Réservation
                </h2>

            </div>
            <div class="mt-10 mx-auto w-full max-w-sm">
                {{-- FORMULAIRE --}}
                <form class="space-y-6" action="{{ route('admin.reservations.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    {{-- CLIENT --}}
                    <div>
                        <label for="client" class="block text-sm font-medium leading-6 text-gray-900">Client</label>
                        <div class="mt-2">
                            <select
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                name="client" id="client">
                                @foreach ($usagers as $usager)
                                    <option value="{{ $usager->id }}">
                                        {{ $usager->id }} {{ $usager->nom }} {{ $usager->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- FORFAIT --}}
                    <div>
                        <label for="forfait">Forfait</label>
                        <div>
                            <select
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                name="forfait" id="forfait">
                                @foreach ($forfaits as $forfait)
                                    <option value="{{ $forfait->id }}" forfaitjour="{{ $forfait->jour }}">
                                        {{ $forfait->id }} {{ $forfait->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- DATE ARRIVEE --}}
                    <div>

                        <label for="date_arrivee" class="block text-sm font-medium leading-6 text-gray-900">Date
                            d'arrivée</label>
                        <div class="mt-2">
                            <input type="date" id="date_arrivee" name="date_arrivee" value="2024-08-19"
                                min="2024-08-19" max="2024-08-21" />
                        </div>
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
                    <a href="{{ route('admin.index') }}" class="hover:text-indigo-600">Retour à l'administration</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>

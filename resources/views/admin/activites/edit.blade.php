<x-layout titre="Modification de l'activité">
    <div class="conteneur-enregistrement">

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier Activité
                </h2>

            </div>
            <div class="flex min-h-full flex-col justify-center px-6 py-1 lg:px-8">

                <div class="mt-10 mx-auto w-full max-w-4xl">
                    <form class="space-y-6" action="{{ route('admin.activites.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- ID --}}
                        <input type="hidden" name="id" value="{{ $activite->id }}">

                        {{-- NOM --}}
                        <div>
                            <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
                            <div class="mt-2">

                                <input id="nom" name="nom" type="text" autofocus
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                    value="{{ old('nom') ?? $activite->nom }}">
                            </div>
                            <x-forms.erreur champ="nom" />
                        </div>

                        {{-- DESCRIPTION --}}
                        <div>
                            <label for="description">Description de l'activité</label>
                            <div>
                                <input type="textarea" id="description" name="description" col="15" row="30"
                                    value="{{ old('description') ?? $activite->description }}">
                            </div>
                            <x-forms.erreur champ="description" />
                        </div>

                        {{-- SUBMIT --}}
                        <div class="mt-2">
                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Modifier!">
                        </div>
                    </form>
                    <form class="space-y-6" action="{{ route('admin.activites.updateimg') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- ID --}}
                        <input type="hidden" name="id" value="{{ $activite->id }}">


                        {{-- IMAGE --}}
                        <div>

                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image de
                                l'activité</label>
                            <div class="mt-2">
                                <input type="file" name="image" id="image">
                            </div>
                            <x-forms.erreur champ="image" />
                        </div>

                        {{-- SUBMIT --}}
                        <div class="mt-2">
                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Modifier!">
                        </div>

                    </form>
                    {{-- SUPPRESSION --}}
                    <form class="space-y-6" action="{{ route('admin.activites.destroy') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2">

                            {{-- ID --}}
                            <input type="hidden" name="id" value="{{ $activite->id }}">

                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Supprimer">
                        </div>

                    </form>

                    {{-- RETOUR A L'INDEX --}}
                    <p class="mt-10 text-center text-sm text-gray-500">
                        <a href="{{ route('admin.index') }}" class="hover:text-indigo-600">Retour</a>
                    </p>
                </div>

            </div>
        </div>
</x-layout>

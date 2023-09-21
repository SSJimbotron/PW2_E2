<x-layout titre="Nouvelle activité">
    <div class="conteneur-enregistrement">
        <div class="formulaire-enregistrement">
            @dump($errors)
            <div>

                <h2 class="font-lovelo neon-text">
                    Nouvelle Activité
                </h2>

            </div>
            <div class=" mt-10 mx-auto w-full max-w-sm">
                {{-- FORMULAIRE --}}
                <form class="space-y-6" action="{{ route('admin.activites.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div>
                        {{-- NOM --}}
                        <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom de
                            l'activité</label>
                        <div class="mt-2">

                            <input id="nom" name="nom" type="text" autofocus
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                value="{{ old('titre') }}">
                        </div>
                        <x-forms.erreur champ="nom" />
                    </div>

                    {{-- DESCRIPTION --}}

                    <div>
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description
                            de l'activité</label>
                        <div>
                            <input type="textarea" name="description" id="description">
                        </div>
                        <x-forms.erreur champ="description" />
                    </div>


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
                    <div>
                        <input type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            value="Ajouter!">
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

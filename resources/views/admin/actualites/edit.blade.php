<x-layout titre="Modification de l'actualité">
    <div class="conteneur-enregistrement">
        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier une Activité
                </h2>

            </div>
            <div class="flex min-h-full flex-col justify-center px-6 py-1 lg:px-8">

                <div class="mt-10 mx-auto w-full max-w-4xl">
                    <form class="space-y-6" action="{{ route('admin.actualites.update') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- ID --}}
                        <input type="hidden" name="id" value="{{ $actualite->id }}">

                        {{-- TITRE --}}
                        <div>
                            <label for="titre"
                                class="block text-sm font-medium leading-6 text-gray-900">titre</label>
                            <div class="mt-2">

                                <input id="titre" name="titre" type="text" autofocus
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
                                    value="{{ old('titre') ?? $actualite->titre }}">

                            </div>
                        </div>

                        {{-- CONTENU --}}
                        <div>
                            <label for="contenu">Contenu de l'actualité</label>
                            <div>
                                <input type="textarea" id="contenu" name="contenu" col="15" row="30"
                                    value="{{ old('contenu') ?? $actualite->contenu }}">
                            </div>
                        </div>

                        {{-- IMAGE --}}
                        <div>

                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image de
                                l'actualité</label>
                            <div class="mt-2">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>

                        {{-- SUBMIT --}}
                        <div class="mt-2">
                            <input type="submit"
                                class="max-w-min m-auto flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                value="Modifier!">
                        </div>
                    </form>

                    {{-- RETOUR AUX ACTUALITES --}}
                    <p class="mt-10 text-center text-sm text-gray-500">
                        <a href="{{ route('admin.index') }}" class="hover:text-indigo-600">Retour à l'administration</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

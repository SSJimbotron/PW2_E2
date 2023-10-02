<x-layout titre="Modification de l'actualité">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">

            <div>

                <h2 class="font-lovelo neon-text">
                    Modifier une actualité
                </h2>

            </div>

            <form action="{{ route('admin.actualites.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $actualite->id }}">

                {{-- TITRE --}}
                <div class="section">
                    <label for="titre" class="font-technorace">titre</label>
                    <div>

                        <input id="titre" name="titre" type="text" autofocus
                            value="{{ old('titre') ?? $actualite->titre }}">

                        <x-forms.erreur champ="titre" />
                    </div>
                </div>

                {{-- CONTENU --}}
                <div class="section">
                    <label for="contenu" class="font-technorace">Contenu de l'actualité</label>
                    <div>
                        <textarea id="contenu" name="contenu" col="15" row="30"
                            value="{{ old('contenu') ?? $actualite->contenu }}">{{ old('contenu') ?? $actualite->contenu }}</textarea>

                        <x-forms.erreur champ="contenu" />
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="submit">

                    <button type="submit" class="font-quicksand">
                        Modifiez l'actualité
                    </button>

                </div>
            </form>

            <form action="{{ route('admin.actualites.updateimg') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $actualite->id }}">

                {{-- IMAGE --}}
                <div class="section">

                    <label for="image" class="font-technorace">Image de
                        l'actualité</label>
                    <div>
                        <input type="file" name="image" id="image">

                        <x-forms.erreur champ="image" />
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="submit">

                    <button type="submit" class="font-quicksand">
                        Modifiez l'image
                    </button>

                </div>


            </form>

            <form action="{{ route('admin.actualites.destroy') }}" method="POST" enctype="multipart/form-data">
                @csrf



                {{-- ID --}}
                <input type="hidden" name="id" value="{{ $actualite->id }}">


                {{-- SUBMIT --}}
                <div class="submit">

                    <button type="submit" class="font-quicksand supprime">
                        Supprimez l'actualité
                    </button>

                </div>


            </form>

            {{-- RETOUR AUX ACTUALITES --}}
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

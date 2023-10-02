<x-layout titre="Nouvelle actualité">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Créer une Actualité
                </h2>

            </div>

                {{-- FORMULAIRE --}}
                <form action="{{ route('admin.actualites.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="section">
                        {{-- TITRE --}}
                        <label for="titre" class="font-technorace">Titre de
                            l'actualité</label>
                        <div>

                            <input id="titre" name="titre" type="text" autofocus
                                value="{{ old('titre') }}">

                                <x-forms.erreur champ="titre" />
                        </div>
                    </div>

                    {{-- CONTENU --}}

                    <div class="section">
                        <label for="contenu" class="font-technorace">Contenu de
                            l'actualité</label>
                        <div>
                            <textarea name="contenu" id="contenu"></textarea>

                            <x-forms.erreur champ="contenu" />
                        </div>
                    </div>


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
                            Créez l'actualité
                        </button>

                    </div>
                </form>

                {{-- LIEN RETOUR --}}
                <div class="retour">
                    <p >
                        <a href="{{ route('admin.index') }}">Retour à l'administration</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

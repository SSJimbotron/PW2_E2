<x-layout titre="Nouvelle activité">
    <div class="conteneur-enregistrement">
        <h1 class="font-lovelo font-bold neon-mauve">ADMINISTRATION</h1>

        <div class="formulaire-enregistrement">
            <div>

                <h2 class="font-lovelo neon-text">
                    Nouvelle Activité
                </h2>

            </div>

            {{-- FORMULAIRE --}}
            <form action="{{ route('admin.activites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="section">
                    {{-- NOM --}}
                    <label for="nom" class="font-technorace">Nom de
                        l'activité</label>
                    <div>

                        <input id="nom" name="nom" type="text" autofocus value="{{ old('titre') }}">

                        <x-forms.erreur champ="nom" />
                    </div>
                </div>

                {{-- DESCRIPTION --}}

                <div class="section">
                    <label for="description" class="font-technorace">Description
                        de l'activité</label>
                        <div>
                            <textarea name="description" id="description" cols="38" rows="10"
                                placeholder="Entrez une description"></textarea>
                            <x-forms.erreur champ="description" />
                        </div>
                </div>


                {{-- IMAGE --}}
                <div class="section">

                    <label for="image" class="font-technorace">Image de
                        l'activité</label>
                    <div>
                        <input type="file" name="image" id="image">

                        <x-forms.erreur champ="image" />
                    </div>
                </div>



                {{-- SUBMIT --}}
                <div class="submit">
                    <button type="submit" class="font-quicksand">
                        Ajouter !
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
